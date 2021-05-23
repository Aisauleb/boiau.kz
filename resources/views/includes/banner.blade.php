{{--
    USAGE

    <!--================Home Banner Area =================-->
    @php
        $h2 = "Проекты компании  \"Boiau CORP\" ";
        $nav_links=[
        [
            'url'=>'/',
            'text'=>'Главная'
        ]
        ];
        Add new Link to banner
        array_push($nav_links,
        [
            'url'=>'/svetilniki',
            'text'=>'Продукции'
        ]);
    @endphp
    @include('includes.banner')
    <!--================End Home Banner Area =================-->
 --}}
@isset($banner)
@section('custom-css')
    <style>
        .banner_area .banner_inner .overlay {
            {{--background: url({{$banner}}) no-repeat scroll center center;--}}
position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 125%;
            bottom: 0;
            z-index: -1;
        }
    </style>
@stop
@endisset

<section class="banner_area" >
    <div class="banner_inner d-flex align-items-center" style="background-color: #030F27">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h1>{{$h2}}</h1>
                <div class="page_link">
                    @foreach($nav_links as $nav_link)
                        <a href={{$nav_link['url']}} >{{$nav_link['text']}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
