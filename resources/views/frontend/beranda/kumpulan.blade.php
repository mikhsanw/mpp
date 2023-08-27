@extends('layouts.frontend.main')
@section('img', ($aplikasi->file_logo?(asset($aplikasi->file_logo->url_stream)):''))
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            @php
                $segments = ucfirst(str_replace('-', ' ', Request::segment(2)));
                $securl = explode('-', Request::segment(2));
            @endphp
            <h1 class="display-3 text-white animated slideInRight">{{$segments}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('').'#'.$securl[1]}}">{{ucfirst($securl[1])}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$segments}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    @if (Request::segment(2) == 'kumpulan-instansi')
    <!-- Team Start -->
    <div class="container-xxl py-5" id="instansi">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Instansi</p>
                <h1 class="display-5 mb-5">Instansi Pada MPP Kab. Bengkalis</h1>
            </div>
            <div class="row g-4">
                @foreach ($data as $item)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <img class="img-fluid" src="{{asset($item->file->url_stream)}}" alt="" style="width: 315px; height: 355px; object-fit:contain; display: block; margin-left: auto; margin-right: auto;">
                        <div class="d-flex">
                            <a href="{{url('', $item->id)}}">
                                <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                <i class="fa fa-2x fa-share text-white"></i>
                            </div></a>
                            <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                                style="height: 90px;">
                                <h5>{{$item->nama}}</h5>
                                <span class="text-primary">{{$item->alamat}}</span>
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
                                        <h6 class="text-white" style="font-size: 11pt; margin-top:8px; margin-left: 5px;">{{App\Model\Layanan::whereInstansiId($item->id)->count()}} Pelayanan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination pagination-lg mt-5 mx-auto d-block">
                {{ $data->links() }}
            </div>
        </div>
    </div>
    <!-- Team End -->
    @endif

    @if (Request::segment(2) == 'kumpulan-berita')
        <!-- Service Start -->
        <div class="container-xxl py-5" id="berita">
            <div class="container">
                <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <!-- <p class="fw-medium text-uppercase text-primary mb-2">Our News</p> -->
                    <h1 class="display-5 mb-4">Berita Seputar MPP Kab. Bengkalis</h1>
                </div>
                <div class="row gy-5 gx-4">
                    @foreach($data as $item)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <img class="img-fluid" src="{{$item->file->url_stream}}" alt="">
                            <div class="service-img">
                                <img class="img-fluid" src="{{$item->file->url_stream}}" alt="">
                            </div>
                            <div class="service-detail">
                                <div class="service-title">
                                    <hr class="w-25">
                                    <h6 class="mb-0">{{$item->nama}}</h6>
                                    <hr class="w-25">
                                </div>
                                <div class="service-text">
                                    <p class="text-white mb-0">{!!Help::shortDescription($item->isi,10)!!}</p>
                                </div>
                            </div>
                            <a class="btn btn-light" href="{{url('company/berita-detail/'.$item->id)}}">Selengkapnya</a>
                        </div>
                    </div>
                    @endforeach                
                </div>
            </div>
            <div class="pagination pagination-lg mt-5 mx-auto d-block">
                {{ $data->links() }}
            </div>
        </div>
        <!-- Service End -->
    @endif
@endsection