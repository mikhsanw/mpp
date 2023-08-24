<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
    <a href="{{url('/')}}" class="navbar-brand ps-5 me-0">
        <h1 class="text-white m-0">{{$aplikasi->singkatan}}</h1>
        
    </a>
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
        @foreach($menu as $key => $val)
            <a class="nav-link aktif {{(is_string($val) ? '' : 'dropdown-toggle')}}" href="{{is_string($val) ? $val : '#'}}">{{$key}}</a>
            @if(!is_string($val))
            <div class="nav-item dropdown">
                @foreach($val as $keydata => $data)
                    @include('layouts.frontend.menu',['data'=>$data])
                @endforeach
            </div>
            @endif
        @endforeach

            <!-- <a href="#about" class="nav-item nav-link">About</a>
            <a href="#fasilitas" class="nav-item nav-link">Fasilitas</a>
            <a href="#berita" class="nav-item nav-link">Berita</a>
            <a href="#galeri" class="nav-item nav-link">Galeri</a>
            <a href="#instansi" class="nav-item nav-link">Instansi</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="project.html" class="dropdown-item">Projects</a>
                    <a href="feature.html" class="dropdown-item">Features</a>
                    <a href="team.html" class="dropdown-item">Our Team</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div> 
            <a href="#contact" class="nav-item nav-link">Contact</a> -->
        </div>
        <a href="" class="btn btn-primary px-3 d-none d-lg-block">Get A Quote</a>
    </div>
</nav>
<!-- Navbar End -->