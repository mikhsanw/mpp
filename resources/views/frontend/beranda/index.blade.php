@extends('layouts.frontend.main')
@section('title', 'Beranda')
@section('img', ($aplikasi->file_logo?(asset($aplikasi->file_logo->url_stream)):''))
@section('content')
<div class="banner-section">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="banner-content text-center">
                    <h1 class="text-danger">{{$aplikasi->singkatan}}</h1>
                    <p>{{$aplikasi->nama}}</p>

                </div>
            </div>
        </div>
    </div>
</div>

<section class="job-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-details-text">
                            <div class="job-card mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-1">
                                        <div class="">
                                            <!-- <img src="{{asset('frontend/assets/img/spbe.png')}}" width="80px" alt="logo"> -->
                                        </div>
                                    </div>
                                    <div class="col-md-11">
                                        <div class="job-info">
                                            <h3>{!!$tentang->title!!}</h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details-text">
                                <p style="font-size: small; text-align: justify;">
                                    {!!$tentang->isi!!}
                                </p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="categories-section pt-5 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Tentang SPBE Kabupaten Bengkalis</h2>
        </div>
        <div class="row">
            @foreach($tentang->children as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{$item->status==2?$item->link:url('/company/page/'.$item->id.'/'.Help::generateSeoURL($item->nama))}}">
                    <div class="category-card">
                        @if($item->file_logo)
                        <img src="{{$item->file_logo->url_stream}}" width="60px" alt="$item->nama">
                        @else
                        <i class='flaticon-website'></i>
                        @endif
                        <h3>{{$item->nama}}</h3>
                        <!-- <p>301 open position</p> -->
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
