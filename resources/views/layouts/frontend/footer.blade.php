<!-- Footer Start -->
<div class="container-fluid bg-red footer mt-5 py-5" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                    <h5 class="text-white">{{$aplikasi->nama}} </h5>
                    <span class="text-white">{{$aplikasi->daerah}}</span>
                
                <p class="mb-2 mt-4 text-white"><i class="fa fa-map-marker-alt me-3"></i>{!!($kontak->filterkontak('alamat')->isi ?? '#')!!}</p>
                <p class="mb-2 text-white"><i class="fa fa-phone-alt me-3"></i>{!!($kontak->filterkontak('telp')->link ?? '#')!!}</p>
                <p class="mb-2 text-white"><i class="fa fa-envelope me-3"></i>{!!($kontak->filterkontak('email')->link ?? '#')!!}</p>
                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="{!!($kontak->filterkontak('twitter')->link ?? '#')!!}"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="{!!($kontak->filterkontak('facebook')->link ?? '#')!!}"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="{!!($kontak->filterkontak('youtube')->link ?? '#')!!}"><i
                            class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="{!!($kontak->filterkontak('instagram')->link ?? '#')!!}"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Link Terkait</h5>
                <a class="btn btn-link text-white" href="https://bengkaliskab.go.id">Bengkaliskab</a>
                <a class="btn btn-link text-white" href="http://www.dpmptsp.bengkaliskab.go.id/">DPMPTSP Bengkalis</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Jam Pelayanan</h5>
                <p class="mb-1 text-white">Senin - Kamis</p>
                <h6 class="text-light">08:00 - 14:00 WIB</h6>
                <p class="mb-1 text-white">Jum'at</p>
                <h6 class="text-light">08:00 am - 11:30 WIB</h6>
            </div>
            <div class="col-lg-3 col-md-6">
                {{-- <h5 class="text-white mb-4">Newsletter</h5> --}}
                
                <div class="position-relative w-100">
                    <img class="img-fluid" src="{{asset('assets/img/bengkalis-bermasa.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->