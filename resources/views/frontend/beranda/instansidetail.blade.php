@extends('layouts.frontend.main')
@section('title', $data->nama)
@section('img', $data->file->url_stream??asset($aplikasi->file_logo->url_stream))
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

<div class="container-fluid py-5 my-5 px-0">
    <div class="mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 80%; visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <div class="text-center">
            {{-- <p class="fw-medium text-uppercase text-primary mb-5">Instansi</p> --}}
            {{-- <h1 class="display-5 mb-5">{{$data->nama}}</h1> --}}
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item">
                <img class="img-fluid" src="{{asset($data->file->url_stream)}}" alt="" style="width: 315px; height: 355px; object-fit:contain; display: block; margin-left: auto; margin-right: auto;">
                <div class="d-flex">
                    <a href="{{url('company/instansi-detail', $data->id)}}">
                        <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                        <i class="fa fa-2x fa-share text-white"></i>
                    </div></a>
                    <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                        style="height: 90px;">
                        <h6>{{$data->nama}}</h6>
                        <span class="text-primary">{{$data->alamat}}</span>
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
                                <h6 class="text-white" style="font-size: 11pt; margin-top:8px; margin-left: 5px;">{{App\Model\Layanan::whereInstansiId($data->id)->count()}} Pelayanan</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5"></div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link text-uppercase active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Layanan</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-uppercase" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Dasar Hukum</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-uppercase" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Persyaratan</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-uppercase" id="timecost-tab" data-bs-toggle="tab" data-bs-target="#timecost" type="button" role="tab" aria-controls="timecost" aria-selected="false">Waktu dan Biaya</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-uppercase" id="flow-tab" data-bs-toggle="tab" data-bs-target="#flow" type="button" role="tab" aria-controls="flow" aria-selected="false">Alur</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p class="mt-2">Jenis Layanan:</p>
                <ol>
                    @foreach (App\Model\Layanan::whereInstansiId($data->id)->get() as $item)
                        <li>{{$item->nama}}</li>
                    @endforeach
                </ol>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">{!!$data->dasarhukum!!}</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">{!!$data->persyaratan!!}</div>
            <div class="tab-pane fade" id="timecost" role="tabpanel" aria-labelledby="timecost-tab">{!!$data->waktudanbiaya!!}</div>
            <div class="tab-pane fade" id="flow" role="tabpanel" aria-labelledby="flow-tab">{!!$data->alur!!}</div>
        </div>
    </div>

      
</div>
    
@endsection
@push('js')
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endpush
