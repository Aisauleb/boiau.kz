@extends('layouts.default')
@section('content')
    <style>
        body{
            background-color: white;
        }
    </style>
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center"  style="background-color: #030F27">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>{{$service->title}}</h2>
                    <div class="page_link">
                        <a href="/">Главная</a>
                        <a href="{{$service->slug}}_{{$service->id}}">{{$service->short_description}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio_details_area p_120">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left_img">
                            <img class="img-fluid" src="/{{$service->image}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portfolio_right_text">
                            <h4>{{$service->title}}</h4>
                            <p>{{$service->short_description}}.</p>
                        </div>
                    </div>
                </div>
                <p>{{$service->description}}</p>
            </div>
        </div>
    </section>

@stop
