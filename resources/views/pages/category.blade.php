@php
    # Home Banner
    $h2 = "Строительные материалы в ЮКО \"Boiau CORP\" ";
    $nav_links=[
        [
            'url'=>'/',
            'text'=>'Главная'
        ]
        ];
    $pad_top = ""; # if needs padding = "pod_top"
    $project_area_title = false;
    array_push($nav_links,
    [
        'url'=>'/stroymarket',
        'text'=>'Продукции'
    ]);
    # project Area
    $cat_products = [];
    $mini_description = "Продукции в ЮКО от Производтелей";
    if(isset($category)){
        $title = $category->name;
        $description = $category->seo_description;
        $mini_description =  $category->mini_description;
        $h2 = $category->name;
        $parent_category = $category->parent()->first();
        if($parent_category){
            array_push($nav_links,
            [
                'url'=>$parent_category->url,
                'text'=>$parent_category->name
            ]);
        }
        array_push($nav_links,
        [
            'url'=>$category->url,
            'text'=>$category->name
        ]);
        $categories = App\Category::with('children')->where('parent_id',$category->id)->get();
        // For Banner
        $banner =$category->image_url;

        foreach ($category->products()->get() as $product){
            array_push($cat_products,$product);
        }
    }

    if(isset($categories)){
       foreach($categories as $category)
        $all_children = $category->childrenRecursive()->get();
        foreach ($category->children()->get() as $last_category){
            foreach ($last_category->products()->get() as $product){
                    array_push($cat_products,$product);
            }
        }
        foreach ($category->products()->limit(4)->get() as $product){
                array_push($cat_products,$product);
        }
    }
    else{
        $title = $h2;
        $description = $h2;
        $categories = App\Category::with('childrenRecursive')->whereNull('parent_id')->get();
    }
    $cat_id = 1;
    $current_url = Illuminate\Support\Facades\URL::current();
@endphp
@isset($canonical)
@section('canonical'){{$canonical}}@stop
@endisset
@if(isset($paginated))
@section('paginated')
    @if($paginated->nextPageUrl() != "")
        <link rel="next" href="{{$current_url.$paginated->nextPageUrl()}}" />
    @endif
    @if($paginated->previousPageUrl() != "")
        <link rel="prev" href="{{$current_url.$paginated->previousPageUrl()}}"/>
    @endif
@stop
@endif

@extends('layouts.default')
@section('title'){{$title}}@stop
@section('description'){{$description}}@stop
@section('custom-css')
    <style>
        body{
            background-color: white;
        }
        .banner_inner {
            min-height: 40vh!important;
        }
        .banner_area {
            min-height: auto!important;
        }

    </style>
@stop
@section('content')

    <!--================Home Banner Area =================-->
    @include('includes.banner')

    <!--================End Home Banner Area =================-->
    <!--================Projects Area =================-->
    <!--================Projects Area =================-->
    <div class="col">
        <div class="row">
            <div id="categories_menu" class="col-md-3 sidebar left ">
                <ul class="list-sidebar bg-defoult">
                    <li>
                        <h3 style="color:white;text-align: center;padding: 5px; background-color: #030f27">
                            Категории продукции
                        </h3>
                    </li>
                    @foreach($menuCategories as $category)
                        <li>
                            <a href="{{$category->url}}" class="collapsed active" >
                                {{--                                    <i class="fa fa-th-large"></i>--}}
                                <span class="nav-label">
                                        {{$category->name}}
                                    </span>
                                <span class="fa fa-chevron-left pull-right"></span>
                            </a>
                            <ul class="sub-menu collapse" id="{{"clps".strval($cat_id)}}">
                                @foreach($category->children as $subcategory)
                                    <li class="active"><a href="{{$subcategory->url}}">{{$subcategory->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @php
                            $cat_id = $cat_id + 1;
                        @endphp
                    @endforeach
                </ul>
            </div>
            <div class="col product_page_col container order-first order-md-last" >
                <div class="row">
                    <div class="col pb-5">
                        <form action="/stroymarket" method="GET" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" placeholder="Поиск строи. материалов">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    @php
                        $project_area_h2 = $title."- Продукции";
                        $project_area_p = $title." и все виды строи. материалов в ЮКО";
                        $products = $cat_products;
                    @endphp
                    @foreach($paginated as $product)
                        <div class="projects_item col-md-4">
                            <img class="product-image" src="{{$product->image_url}}" alt="Boiau CORP Продукции {{$product->title}}">
                            <div>
                                <a href="{{$product->url}}" >
                                    <div>
                                        <h6>{{$product->title}}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    @if(isset($paginated))
                        <div class="col-md-9 p-3">
                            <nav aria-label="Страницы">
                                {!! $paginated->links()  !!}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <!--================End Projects Area =================-->

@stop
{{--@section('custom-js')--}}
{{--<script>--}}
{{--</script>--}}
{{--@stop--}}
