<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Halaman;
use App\Model\File;
use App\Model\foto;
use App\Model\Video;
use App\Model\Berita;
use App\Model\Agenda;
use App\Model\JadwalPemilu;
use App\Model\Calon;
use App\Model\Instansi;
use App\Model\Layanan;
use Carbon;
use DB;
use Yajra\DataTables\Facades\DataTables;

class contentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $arr=array(
        'data' => Halaman::find($id),
        'doc' => File::whereMorphId($id)->orderBy('id','desc')->get(),
        );
        return view('frontend.beranda.index',$arr);
    }
    public function galeri($jenis)
    {
        if($jenis==='foto'){
            $arr=array(
                'jenis' => $jenis,
                'data' => foto::where('status',config('master.status_foto.galeri'))->orderBy('id','desc')->simplePaginate(16),
            );
        }elseif($jenis==='video'){
            $arr=array(
                'jenis' => $jenis,
                'data' => video::whereStatus(0)->orderBy('id','desc')->simplePaginate(16),
            );
        }elseif($jenis==='infografis'){
            $arr=array(
                'jenis' => $jenis,
                'data' => foto::where('status',config('master.status_foto.infografis'))->orderBy('id','desc')->simplePaginate(16),
            );
        }
        return view('frontend.beranda.galeri',$arr);
    }
    public function berita()
    {
        $arr=array(
            'data' => Berita::whereStatus(0)->orderBy('tanggal','desc')->paginate(9),
        );
        return view('frontend.beranda.berita',$arr);
    }
    public function artikel()
    {
        $arr=array(
            'data' => Berita::whereStatus(1)->orderBy('tanggal','desc')->paginate(9),
        );
        return view('frontend.beranda.berita',$arr);
    }
    public function beritadetail($id){
        $berita=Berita::find($id);
        Berita::where('id', $berita->id)->update(['view' => $berita->view+1]);

        $arr=array(
            'data' => $berita,
        );

        return view('frontend.beranda.beritadetail',$arr);
    }

    public function informasi($id)
    {
        $Halaman = Halaman::select('id')->where('jenis',$id)->first();
        $arr=array(
            'data' => Halaman::find($Halaman->id),
            'doc' => File::whereMorphId($id)->get(),
            );
        return view('frontend.beranda.Halaman',$arr);
    }

    public function pemilu($jenis)
    {
        $arr=array(
            'jenis' => strtoupper(config('master.pemilu.'.$jenis)),
            'jadwal' => JadwalPemilu::whereJenis($jenis)->whereStatus(1)->whereNull('parent_id')->orderBy('id','desc')->first(),
            'calon' => Calon::whereJenis($jenis)->whereStatus(1)->whereNull('parent_id')->orderBy('id','desc')->first()
        );
        return view('frontend.beranda.pemilu',$arr);
    }

    public function agenda()
    {
        $arr=array(
        'video' => Video::whereStatus(1)->first()
        );
        return view('frontend.beranda.agenda',$arr);
    }
    public function datainternal(Request $request)
    {
        if ($request->ajax()) {
            $data = Agenda::whereJenis(0)->whereDate('created_at',Carbon::today())->get();
            return Datatables::of($data)
            ->addColumn('lokasi', function ($q) {
                return $q->lokasi;
            })
            ->addColumn('keterangan', function ($q) {
                return $q->keterangan;
            })
            ->rawColumns(['keterangan','lokasi'])->addIndexColumn()->make(TRUE);
        }
        else {
            exit("Not an AJAX request -_-");
        }
    }
    public function dataexternal(Request $request)
    {
        if ($request->ajax()) {
            $data = Agenda::whereJenis(1)->whereDate('created_at',Carbon::today())->get();
            return Datatables::of($data)
            ->addColumn('lokasi', function ($q) {
                return $q->lokasi;
            })
            ->addColumn('keterangan', function ($q) {
                return $q->keterangan;
            })
            ->rawColumns(['keterangan','lokasi'])->addIndexColumn()->make(TRUE);
        }
        else {
            exit("Not an AJAX request -_-");
        }
    }

    // Fungsi untuk menampilkan kumpulan instansi
    public function kumpulanberita()
    {
        $arr=array(
            'data' => Berita::whereStatus(0)->orderBy('tanggal','desc')->paginate(12),
        );
        return view('frontend.beranda.kumpulan',$arr);
    }

    // Fungsi untuk menampilkan kumpulan instansi
    public function kumpulaninstansi()
    {
        $arr=array(
            'data' => Instansi::paginate(12),
        );
        return view('frontend.beranda.kumpulan',$arr);
    }

    // Menampilkan detail Instansi
    public function instansidetail($id){
        $instansi=Instansi::find($id);
        $arr=array(
            'data' => $instansi,
        );

        return view('frontend.beranda.instansidetail',$arr);
    }


    // Fungsi untuk live search pada kumpulan instansi
    function action(Request $request){
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');

            if($query != ''){
                $data = Instansi::where('nama', 'like', '%'.$query.'%')->get();         
            }
            
            else{
                $data = Instansi::get();
            }

            $total_row = $data->count();

            if($total_row > 0){
                foreach($data as $row)
                {
                $output .= '
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <img class="img-fluid" src="'.asset($row->file->url_stream).'" alt="" style="width: 315px; height: 355px; object-fit:contain; display: block; margin-left: auto; margin-right: auto;">
                        <div class="d-flex">
                            <a href="'.url('company/instansi-detail', $row->id).'">
                                <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                <i class="fa fa-2x fa-share text-white"></i>
                            </div></a>
                            <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                                style="height: 90px;">
                                <h5>'.$row->nama.'</h5>
                                <span class="text-primary">'.$row->alamat.'</span>
                                <div class="team-social d-flex">
                                    <div class="d-flex" style="align-items: center; margin-right: 15px;">
                                        <a class="btn btn-square btn-dark rounded-circle mx-1" href="">
                                            <i class="fa fa-desktop"></i>
                                        </a>
                                        <h6 class="text-white" style="font-size: 11pt; margin-top:8px; margin-left: 5px;">1 Loket</h6>
                                    </div>
                                    <div class="d-flex" style="align-items: center;">
                                        <a class="btn btn-square btn-dark rounded-circle mx-1" href="">
                                            <i class="fa fa-bookmark"></i>
                                        </a>
                                        <h6 class="text-white" style="font-size: 11pt; margin-top:8px; margin-left: 5px;">'.Layanan::whereInstansiId($row->id)->count().' Pelayanan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
                }
            }

            else{
                $output = '<span style="color:red;">Maaf, nama instansi yang anda input tidak ditemukan</span>';
            }

            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
