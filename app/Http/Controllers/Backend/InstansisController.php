<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class InstansisController extends Controller
{
    public function index()
    {
        return view('backend.'.$this->kode.'.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $data= $this->model::query();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', '<div style="text-align: center;">
               <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" '.$this->kode.'-id="{{ $id }}" href="#edit-{{ $id }}">
                   <i class="fa fa-edit text-warning"></i>
               </a>&nbsp; &nbsp;
               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" href="#hapus-{{ $id }}" '.$this->kode.'-id="{{ $id }}">
                   <i class="fa fa-trash text-danger"></i>
               </a>
           </div>')->toJson();
        }
        else {
            exit("Not an AJAX request -_-");
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.$this->kode.'.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
					'nama' => 'required|'.config('master.regex.text'),
					'alamat' => 'required|'.config('master.regex.text'),
					'telepon' => 'required',
					'tracking' => 'required|'.config('master.regex.text'),
					'email' => 'required',
					'website' => 'required|'.config('master.regex.json'),
					'dasarhukum' => 'required|'.config('master.regex.json'),
					'persyaratan' => 'required|'.config('master.regex.json'),
					'waktudanbiaya' => 'required|'.config('master.regex.json'),
					'alur' => 'required|'.config('master.regex.json'),
                    'logo_instansi' => 'required|mimes:jpg,jpeg,png'
                ]);
            if ($validator->fails()) {
                $respon=['status'=>false, 'pesan'=>$validator->messages()];
            }
            else {
                $data = $this->model::create($request->all());
                if ($request->hasFile('logo_instansi')) {
                    $data->file()->create([
                        'name'      => 'logo_instansi',
                        'data'      =>  [
                        'disk'      => config('filesystems.default'),
                        'target'    => Storage::putFile($this->kode.'/logo_instansi/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('logo_instansi')),
                        ]
                    ]);
                }
                $respon=['status'=>true, 'pesan'=>'Data berhasil disimpan'];
            }
            return $respon;
        }
        else {
            exit('Ops, an Ajax request');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'data'    => $this->model::find($id)
        ];
        return view('backend.'.$this->kode.'.ubah', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                'nama' => 'required|'.config('master.regex.text'),
                'alamat' => 'required|'.config('master.regex.text'),
                'telepon' => 'required',
                'tracking' => 'required|'.config('master.regex.text'),
                'email' => 'required',
                'website' => 'required|'.config('master.regex.json'),
                'dasarhukum' => 'required|'.config('master.regex.json'),
                'persyaratan' => 'required|'.config('master.regex.json'),
                'waktudanbiaya' => 'required|'.config('master.regex.json'),
                'alur' => 'required|'.config('master.regex.json'),
                'logo_instansi'        => $request->hasFile('logo_instansi') ? 'required|mimes:jpg,png,jpeg' : ''
            ]);
            if ($validator->fails()) {
                $response=['status'=>FALSE, 'pesan'=>$validator->messages()];
            }
            else {
                $data = $this->model::find($id);
                $data->update($request->all());
                if ($request->hasFile('logo_instansi')) {
                    $data->file()->update([
                            'data'      =>  [
                                'disk'      => config('filesystems.default'),
                                'target'    => Storage::putFile($this->kode.'/logo_instansi/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('logo_instansi')),
                            ]
                    ]);
                }
                $respon=['status'=>true, 'pesan'=>'Data berhasil diubah'];
            }
            return $response ?? ['status'=>TRUE, 'pesan'=>['msg'=>'Data berhasil diubah']];
        }
        else {
            exit('Ops, an Ajax request');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $data=$this->model::find($id);
        return view('backend.'.$this->kode.'.hapus', ['data'=>$data]);
    }

    public function destroy($id)
    {
        $data=$this->model::find($id);
        if ($data->delete()) {
            $response=['status'=>TRUE, 'pesan'=>['msg'=>'Data berhasil dihapus']];
        }
        else {
            $response=['status'=>FALSE, 'pesan'=>['msg'=>'Data gagal dihapus']];
        }
        return response()->json($response);
    }
}