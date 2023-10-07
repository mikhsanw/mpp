<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="author" content="{{$aplikasi->nama}}" />
	<meta name="description" content="{{$aplikasi->singkatan.' '.$aplikasi->daerah}} - @yield('title')" />
    <link rel="canonical" href="{{url()->full()}}" />
	<meta property="og:locale" content="id_ID" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="@yield('title')" />
	<meta property="og:description" content="{{$aplikasi->singkatan.' '.$aplikasi->daerah}} - @yield('title')" />
	<meta property="og:url" content="{{url()->full()}}" />
	<meta property="og:site_name" content="{{$aplikasi->singkatan.' '.$aplikasi->daerah}} - @yield('title')" />
	<meta property="article:modified_time" content="{{date('Y-m-d H:i:s')}}" />
	<meta property="og:image" content="@yield('img')" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:label1" content="Est. reading time" />
	<meta name="twitter:data1" content="3 minutes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Title -->
    @hasSection('title')
        <title>@yield('title') | {{$aplikasi->singkatan.' '.$aplikasi->daerah}}</title>
    @else
        <title>{{$aplikasi->nama.' '.$aplikasi->daerah}}</title>
    @endif

    <!-- Favicon -->
    @if($aplikasi->file_favicon)
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($aplikasi->file_favicon->url_stream)??'' }}">
    @endif

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery.min.css">
    

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets')}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">

    @stack('css')

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
                <div class="h-100 d-inline-flex align-items-center text-white">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" href="{!!($kontak->filterkontak('facebook')->link ?? '#')!!}"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href="{!!($kontak->filterkontak('twitter')->link ?? '#')!!}"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href="{!!($kontak->filterkontak('youtube')->link ?? '#')!!}"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-link text-light" href="{!!($kontak->filterkontak('instagram')->link ?? '#')!!}"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                    <span class="fs-5 fw-bold me-2">
                        <i class="fa fa-phone-alt me-2"></i>
                        <!-- Call Us: -->
                    </span>
                    <span class="fs-5 fw-bold">{!!($kontak->filterkontak('telp')->link ?? '')!!}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    @include('layouts.frontend.header')


    @yield('content')


    @include('layouts.frontend.footer')

    <!-- Modal -->
    <div class="modal fade" id="maklumatpelayanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-body">
                <img src="{{asset('assets')}}/img/maklumatpelayanan.png" alt="" class="img-fluid">
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-body">
                <img src="{{asset('assets')}}/img/sop.png" alt="" class="img-fluid">
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="probis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-body">
                <img src="{{asset('assets')}}/img/probis.png" alt="" class="img-fluid">
            </div>
            </div>
        </div>
    </div>

    <!-- Copyright Start -->
    <div class="container-fluid bg-white copyright py-4">
        <div class="container text-center">
            <p style="color: #000000 !important;" class="mb-2">Development By &copy; <a class="fw-semi-bold" href="#">Tim PBE Diskominfotik Kabupaten Bengkalis 2023</a>, All Right Reserved.
            </p>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a> -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
    <script src="{{asset('assets')}}/lib/wow/wow.min.js"></script>
    <script src="{{asset('assets')}}/lib/easing/easing.min.js"></script>
    <script src="{{asset('assets')}}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{asset('assets')}}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets')}}/js/main.js"></script>
    <script>
        $(document).ready(function(){
            $('.aktif').click(function(){
                $('.aktif').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
    @stack('js')
    <script>
        lightGallery(document.getElementById('lightgallery'), {
        speed: 500,
        mode: 'lg-fade',
        selector: '.img-fluid',
    });
    </script>
</body>

</html>