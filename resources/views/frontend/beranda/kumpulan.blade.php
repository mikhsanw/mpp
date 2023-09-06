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
            <h1 class="display-3 text-white animated slideInRight">{{ucwords($segments)}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('').'#'.$securl[1]}}">{{ucwords($securl[1])}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ucwords($segments)}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    @if (Request::segment(2) == 'kumpulan-instansi')
    <!-- Team Start -->
    <div class="container-xxl py-5" id="instansi">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp mb-5" data-wow-delay="0.1s" style="max-width: 700px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Unit Layanan</p>
                <h1 class="display-5">Unit Layanan <br> MPP Kabupaten Bengkalis</h1>
            </div>
            <div class="form-group mt-5 mb-5">
                <input type="text" name="search" id="search" class="form-control" placeholder="Cari berdasarkan nama unit layanan" />
            </div>
            <div class="row g-4" id="data-instansi">
                {{-- Tempat data instansi --}}
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

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
    <script>
        $(document).ready(function(){
        
            fetch_customer_data();
            
            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('live_search') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#data-instansi').html(data.table_data);
                        // $('#total_records').text(data.total_data);
                    }
                })
            }
            
            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@endpush