@extends('layouts.frontend.main')
@section('img', ($aplikasi->file_logo?(asset($aplikasi->file_logo->url_stream)):''))
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($slider as $row => $item)
                <div class="carousel-item {{$row==0?'active':''}}">
                    <img class="w-100 img-fluid" src="{{asset($item->file->url_stream)}}" alt="{{$item->nama}}">
                    {{-- <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">Mal Pelayanan Publik</p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">{{$item->nama}}</h1>
                                    <!-- <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">Explore More</a> -->
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container"  id="about">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row gx-3 h-100">
                        <div class="col-6 wow fadeInUp" data-wow-delay="0.1s">
                            {{-- <img class="img-fluid" src="{{asset('assets')}}/img/gedung.png"> --}}
                            <img class="img-fluid" src="{{asset('assets')}}/img/about-1.png">
                        </div>
                        <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                            <img class="img-fluid" src="{{asset('assets')}}/img/about-2.png">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">Tentang Kami</p>
                    <h1 class="display-5 mb-4 text-primary">Sekilas MPP Kabupaten Bengkalis</h1>
                    <p class="mb-4" style="text-align: justify">
                        MPP dirancang oleh KEMEPAN RB sebagai bagian dari perbaikan menyeluruh dan transformasi tata kelola pelayanan publik. Menggabungkan berbagai jenis pelayanan pada satu tempat, 
                        penyederhaan dan prosedur serta integrasi pelayanan pada Mal Pelayanan Publik akan memudahkan akses masyarakat dalam mendapat berbagai jenis pelayanan, serta meningkatkan kepercayaan masyarakat kepada penyelenggara pelayanan publik.
                    </p>
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0 bg-primary p-4">
                            <h1 class="display-2 text-white">{{$jumlah['instansi']}}</h1>
                            <h5 class="text-white">Instansi</h5>
                            <h5 class="text-white">Siap Melayani</h5>
                            <h5 class="text-white">Dengan Ramah</h5>
                        </div>
                        <div class="ms-4">
                            <p><i class="fa fa-check text-primary me-2"></i>Melayani setulus Hati</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Efisien, Cepat dan Akurat</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Agile Dalam Melayani</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Transparan Dalam Pelayanan</p>
                            <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Berusaha Memberi Kenyamanan</p>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-envelope-open text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Email Kami</p>
                                    <h6 class="mb-0">{!!($kontak->filterkontak('email')->link ?? '')!!}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Hubungi Kami</p>
                                    <h6 class="mb-0">{!!($kontak->filterkontak('telp')->link ?? '')!!}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid bg-red facts my-5 p-5">
        <div class="row g-5">
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center border p-5">
                    <i class="fa fa-certificate fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-white mb-0" data-toggle="counter-up">{{$jumlah['instansi']}}</h1>
                    <span class="fs-5 fw-semi-bold text-white">Jumlah Instansi</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center border p-5">
                    <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-white mb-0" data-toggle="counter-up">{{$jumlah['layanan']}}</h1>
                    <span class="fs-5 fw-semi-bold text-white">Jumlah Pelayanan</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center border p-5">
                    <i class="fa fa-users fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-white mb-0" data-toggle="counter-up">0</h1>
                    <span class="fs-5 fw-semi-bold text-white">Jumlah Loket</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="text-center border p-5">
                    <i class="fa fa-check-double fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-white mb-0" data-toggle="counter-up">0</h1>
                    <span class="fs-5 fw-semi-bold text-white">Jumlah Antrian Hari Ini</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Features Start -->
    <div class="container-xxl py-5" id="fasilitas">
        <div class="container">
            <div class="text-left pb-4 wow fadeInLeft" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Fasilitas</p>
                <h1 class="display-5 text-primary mb-4">Fasilitas MPP Kabupaten Bengkalis</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12" data-wow-delay="0.5s">
                    <div class="row gy-4">
                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-3 col-lg-4 wow fadeInDown" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                @foreach ($fasilitas as $row => $item)
                                    <button class="nav-link py-3 px-5 fw-medium text-uppercase {{$row == 0 ? 'active' : ''}}" id="v-pills-{{$row}}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{$row}}" type="button" role="tab" aria-controls="v-pills-{{$row}}" aria-selected="true"><i class="fa fa-gear"></i> {{$item->nama}}</button>
                                @endforeach
                            </div>
                            <div class="tab-content col-lg-8 wow fadeInUp" id="v-pills-tabContent">
                                @foreach ($fasilitas as $row => $item)
                                <div class="tab-pane fade {{$row == 0 ? 'show active' : ''}}" id="v-pills-{{$row}}" role="tabpanel" aria-labelledby="v-pills-{{$row}}-tab">
                                    <h6 class="fw-medium text-uppercase text-primary mb-2">{{$item->nama}}</h6>
                                    <p style="text-align: justify">{{$item->keterangan}}</p>
                                    <img class="w-50 img-fluid img-fasilitas" src="{{asset($item->file->url_stream)}}" alt="{{$item->nama}}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Video Modal Start -->
    {{-- <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Video Modal End -->


    <!-- Service Start -->
    <div class="container-xxl py-5" id="berita">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Berita</p>
                <h1 class="display-5 mb-4 text-primary">Berita Seputar MPP Kabupaten Bengkalis</h1>
            </div>
            <div class="btn-kumpulan">
                <a href="{{url('/company/kumpulan-berita')}}" class="btn btn-primary py-3 px-5 wow fadeInLeft"><i class="fa fa-list"></i> Kumpulan Berita</a>
            </div>
            <div class="row gy-5 gx-4">
                @foreach($berita as $item)
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
    </div>
    <!-- Service End -->


    <!-- Project Start -->
    <div class="container-fluid bg-red pt-5 my-5 px-0" id="galeri">
        <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-white mb-2">Galeri</p>
            <h1 class="display-5 text-white mb-5">Galeri MPP Kabupaten Bengkalis</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s" id="lightgallery">

            @foreach ($foto as $item)    
            <a class="project-item" href="{{$item->file->url_stream}}">
                <img class="img-fluid" src="{{$item->file->url_stream}}" alt="" style="width: 100%; height: 320px; object-fit:cover;">
                <div class="project-title">
                    <h6 class="text-primary mb-0" style="font-size: 11pt;">{{$item->nama}}</h6>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <!-- Project End -->


    <!-- Team Start -->
    <div class="container-xxl py-5" id="instansi">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Instansi</p>
                <h1 class="display-5 text-primary mb-5">Instansi Pada MPP <br>Kabupaten Bengkalis</h1>
            </div>
            <div class="row g-4">
                <div class="btn-kumpulan">
                    <a href="{{url('/company/kumpulan-instansi')}}" class="btn btn-primary py-3 px-5 wow fadeInLeft"><i class="fa fa-list"></i> Kumpulan Instansi</a>
                </div>

                <div class="row" style="margin-top: -70px;">
                    @foreach ($instansi  as $row => $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <img class="img-fluid" src="{{asset($item->file->url_stream)}}" alt="" style="width: 315px; height: 355px; object-fit:contain; display: block; margin-left: auto; margin-right: auto;">
                            <div class="d-flex">
                                <a href="{{url('company/instansi-detail', $item->id)}}">
                                    <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                    <i class="fa fa-2x fa-share text-white"></i>
                                </div></a>
                                <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                                    style="height: 90px;">
                                    <h6>{{$item->nama}}</h6>
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
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Testimonial</p>
                <h1 class="display-5 mb-5">What Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto mb-5" src="{{asset('assets')}}/img/testimonial-1.jpg">
                        <div class="btn-square bg-primary rounded-circle">
                            <i class="fa fa-quote-left text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center rounded p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna
                            ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea
                            clita.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto mb-5" src="{{asset('assets')}}/img/testimonial-2.jpg">
                        <div class="btn-square bg-primary rounded-circle">
                            <i class="fa fa-quote-left text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center rounded p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna
                            ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea
                            clita.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto mb-5" src="{{asset('assets')}}/img/testimonial-3.jpg">
                        <div class="btn-square bg-primary rounded-circle">
                            <i class="fa fa-quote-left text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center rounded p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna
                            ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea
                            clita.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5" id="kontak">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Kontak</p>
                <h1 class="display-5 mb-5">Jangan Sungkan Untuk Menghubungi</h1>
            </div>
            <div class="row g-5 justify-content-center mb-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light text-center h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">Nomor Telepon</h4>
                        <p class="mb-2">{!!($kontak->filterkontak('telp')->link ?? '')!!}</p>
                        <a class="btn btn-primary px-4" href="tel:{!!($kontak->filterkontak('telp')->link ?? '')!!}">Hubungi Sekarang <i
                                class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light text-center h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="fa fa-envelope-open fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">Alamat Email</h4>
                        <p class="mb-2">{!!($kontak->filterkontak('email')->link ?? '')!!}</p>
                        <!-- <p class="mb-4">support@example.com</p> -->
                        <a class="btn btn-primary px-4" href="mailto:{!!($kontak->filterkontak('email')->link ?? '')!!}">Kirim Surel <i
                                class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light text-center h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">Alamat</h4>
                        <p class="mb-2">{!!($kontak->filterkontak('alamat')->isi ?? '')!!}</p>
                        <a class="btn btn-primary px-4" href="{!!($kontak->filterkontak('alamat')->link ?? '')!!}"
                            target="blank">Menuju Alamat <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <iframe class="w-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15954.051660848709!2d102.11749254726503!3d1.4657016263280322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d15e36b4c4ad2f%3A0xfe6a8b2b1d4df01f!2sDinas%20Penanaman%20Modal%20dan%20Pelayanan%20Terpadu%20Satu%20Pintu!5e0!3m2!1sid!2sid!4v1692782649492!5m2!1sid!2sid"
                        frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
            {{-- <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fw-medium text-uppercase text-primary mb-2">Contact Us</p>
                    <h1 class="display-5 mb-4">If You Have Any Queries, Please Feel Free To Contact Us</h1>
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form
                        with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're
                        done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6>Call Us</h6>
                                    <span>+012 345 67890</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                                    <i class="fa fa-envelope text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6>Mail Us</h6>
                                    <span>info@example.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Contact End -->

    <script>
        $('#myCollapsible').collapse({
        toggle: false
        })

    </script>
@endsection