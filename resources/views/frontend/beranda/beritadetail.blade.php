@extends('layouts.frontend.main')
@section('title', $data->nama)
@section('img', $data->file->url_stream??asset($aplikasi->file_logo->url_stream))
@section('content')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
    <div class="container py-5">
        <h1 class="display-3 text-white  slideInRight">Berita</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb  slideInRight mb-0">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Berita</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid py-5 my-5 px-0">
    <div class="mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 80%; visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <div class="text-center">
            <p class="fw-medium text-uppercase text-primary mb-2">Berita Selengkapnya</p>
            <h1 class="display-5 mb-5">{{$data->nama}}</h1>
        </div>
        <div class="text-justify">
            <p class="mb-4">
                {!!$data->isi!!}
            </p>
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
