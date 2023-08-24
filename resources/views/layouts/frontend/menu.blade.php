    @if($data->children->count() > 0 && $data->status != 4)
    <a class="nav-link aktif" href="{{url('#')}}">{{$data->nama}}</a>
    <div class="dropdown-menu bg-light m-0">
        @foreach($data->children as $sub)
            @include('layouts.frontend.menu', ['data'=>$sub])
        @endforeach
    </div>
    @else
        @if($data->status==2)
        <a class="nav-link aktif" href="{{$data->link}}">{{$data->nama}}</a>
        @else
        <a class="nav-link aktif" href="{{url('/company/page/'.$data->id.'/'.Help::generateSeoURL($data->nama))}}">{{$data->nama}}</a>
        @endif

    @endif
</li>