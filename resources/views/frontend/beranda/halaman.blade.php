@extends('layouts.frontend.main')
@section('title', $data->nama)
@section('img', ($aplikasi->file_logo?(asset($aplikasi->file_logo->url_stream)):''))
@section('content')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
    <div class="container py-5">
        <h1 class="display-3 text-white  slideInRight">{{$data->nama}}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb  slideInRight mb-0">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$data->nama}}</li>
            </ol>
        </nav>
    </div>
</div>

@if($data->status==4)
<section class="categories-section faq-section pt-5 pb-70">
    <div class="container">
        <div class="row">
            @foreach($data->children as $item)
            @if($item->status=='1') 
            <div class="col-lg-12">
                <div class="accordions">
                    <div class="accordion-item">
                        <div class="accordion-title" data-tab="item1">
                            <h2>{{$item->nama}}<i class="bx bx-chevrons-right down-arrow"></i></h2>
                        </div>
                        <div class="accordion-content" id="item1" style="display: none;">
                            <div class="row">
                                @foreach($item->children as $val)
                                <div class="col-lg-3 col-sm-6">
                                    <a
                                        href="{{$val->status==2?$val->link:url('/company/page/'.$val->id.'/'.Help::generateSeoURL($val->nama))}}">
                                        <div class="category-item">
                                            <i class="flaticon-website"></i>
                                            <h3>{{$val->nama}}</h3>
                                            <p>{{$item->nama}}</p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a
                    href="{{$item->status==2?$item->link:url('/company/page/'.$item->id.'/'.Help::generateSeoURL($item->nama))}}">
                    <div class="category-card">
                        @if($item->file_logo)
                        <img src="{{$item->file_logo->url_stream}}" width="60px" alt="{{$item->nama}}">
                        @else
                        <i class='flaticon-website'></i>
                        @endif
                        <h3>{{$item->nama}}</h3>
                        <!-- <p>301 open position</p> -->
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

@elseif($data->status==3)
<section class="job-style-two job-list-section pt-4 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h3>Daftar Dokumen {{$data->nama}}</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="list-group">
                    @foreach($doc as $dokumen)
                    @if($dokumen->getExtensionAttribute()==="pdf")
                    <a href="#" class="list-group-item list-group-item-action dokumen" data-bs-toggle="modal"
                        data-bs-target="#dokumen-modal-lg" data-bs-title="{{$dokumen->name}}"
                        data-bs-whatever="{{$dokumen->url_stream}}">
                        <i class="bx bxs-file-pdf dokumen" data-bs-toggle="modal" data-bs-target="#dokumen-modal-lg"
                            data-bs-title="{{$dokumen->name}}" data-bs-whatever="{{$dokumen->url_stream}}"></i>
                        {{$dokumen->name}}
                    </a>
                    @else
                    <a href="{{$dokumen->url_download}}"
                        download="{{$dokumen->name.'.'.$dokumen->getExtensionAttribute()}}"
                        class="list-group-item list-group-item-action">
                        <i class="bx bxs-download"></i>
                        {{$dokumen->name}}
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="contact-form-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10">
                @if($data->status==0)
                <p>{!!$data->isi!!}</p>
                @elseif($data->status==3)
                <div class="list-group">
                    @foreach($doc as $dokumen)
                    @if($dokumen->getExtensionAttribute()==="pdf")
                    <a href="#" class="list-group-item list-group-item-action dokumen" data-bs-toggle="modal"
                        data-bs-target="#dokumen-modal-lg" data-bs-title="{{$dokumen->name}}"
                        data-bs-whatever="{{$dokumen->url_stream}}">
                        <i class="bx bxs-file-pdf dokumen" data-bs-toggle="modal" data-bs-target="#dokumen-modal-lg"
                            data-bs-title="{{$dokumen->name}}" data-bs-whatever="{{$dokumen->url_stream}}"></i>
                        {{$dokumen->name}}
                    </a>
                    @else
                    <a href="{{$dokumen->url_download}}"
                        download="{{$dokumen->name.'.'.$dokumen->getExtensionAttribute()}}"
                        class="list-group-item list-group-item-action">
                        <i class="bx bxs-download"></i>
                        {{$dokumen->name}}
                    </a>
                    @endif
                    @endforeach
                </div>
                @elseif($data->status==5)
                @if($data->file)
                @if($data->file->extension=='pdf')
                <object data="{{$data->file->url_stream.'?t='.time() ?? '#'}}" type="application/pdf"
                    style="background: transparent url('backend/img/loading.gif') no-repeat center; width: 100%;height: 700px">
                    <p>
                        File PDF tidak dapat ditampilkan, silahkan download file
                        <a download="{{$data->nama}}" href="{{$data->file->url_stream ?? '#'}}" target="_blank">
                            <span class="fa fa-download"> di sini</span>
                        </a>
                    </p>
                </object>
                @elseif($data->file->extension=='jpg' || $data->file->extension=='png')
                <p>
                    <img src="{{$data->file->url_stream.'?t='.time() ?? '#'}}" />
                </p>
                @else
                <p>
                    File tidak dapat ditampilkan, silahkan download file
                    <a download="{{$data->nama}}" href="{{$data->file->url_download.'?t='.time() ?? '#'}}"
                        target="_blank">
                        <span class="fa fa-download"> di sini</span>
                    </a>
                </p>
                @endif
                @endif
                @endif
            </div>
        </div>
    </div>
</section><!-- #content end -->
@endif
<a href="https://wa.me/{!!($kontak->filterkontak('telp')->link ?? '#')!!}?text=Hi%20Qiscus" class="floating" target="_blank">
<i class="fab fa-whatsapp fab-icon"></i> 
<span class="text">Klinik Laksamana</span>
</a>
@endsection
@push('css')
<style>
    .line {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .category-card img {
        font-size: 50px;
        color: #fd1616;
        margin-bottom: 25px;
        display: inline-block;
        line-height: 1;
    }

</style>

<!-- add your custom CSS -->
<style>

/* Add WA floating button CSS */
.floating {
    position: fixed;
    display:flex;
    bottom: 90px;
    right: 30px;
    width: 140px;
    height: 50px;
    padding-top: 5px;
    justify-content:center;
    /* font-size: 30px; */
    cursor: pointer;
    z-index: 9000;

    background-color: rgb(41,167,26);
color: #fff;
border-radius: 20px;
text-align: center;
box-shadow: 1px 1px 3px #999;

.text{
    font-size:14px;
    font-weight: bold;
}
}

.fab-icon {
margin-left: 8px;
font-size: 40px;
}
</style>
@endpush
