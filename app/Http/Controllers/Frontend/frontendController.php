<?php

namespace App\Http\Controllers\Frontend;

use App\Model\foto;
use App\Model\Berita;
use App\Model\Halaman;
use App\Model\Layanan;
use App\Model\Instansi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = array(
            'slider' => foto::where('status',config('master.status_foto.slider'))->orderBy('id','desc')->take(5)->get(),
            'berita' => Berita::where('status',0)->orderBy('tanggal', 'desc')->take(3)->get(),
            'jumlah' => [
                'instansi' => Instansi::count(),
                'layanan' => Layanan::count(),
            ],
            'tentang' => Halaman::where('jenis',0)->whereNull('parent_id')->first(),
            'instansi' => Instansi::orderBy('id','desc')->take(3)->get(),
            'foto' => Foto::where('status',0)->orderBy('id','desc')->get(),

        );
        return view('frontend.beranda.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
