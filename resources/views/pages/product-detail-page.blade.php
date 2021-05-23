@php
    $h2 = "Строительные материалы в ЮКО \"Boiau CORP\"  ";
    $nav_links=[
        [
            'url'=>'/',
            'text'=>'Главная'
        ]
        ];
    array_push($nav_links,
    [
        'url'=>'/svetilniki',
        'text'=>'Продукции'
    ]);
    if(isset($product)){
        $title = $product->title;
        $description = $product->mini_description;
        $h2 = $product->title;
        $parent_category = $product->category()->first();
        if($parent_category){
            array_push($nav_links,
            [
                'url'=>$parent_category->url,
                'text'=>$parent_category->name
            ]);
        }
        array_push($nav_links,
        [
            'url'=>$product->url,
            'text'=>$product->title
        ]);
        $banner =$product->image_url;
    }
    $cat_id = 1;
@endphp
@isset($canonical)
@section('canonical'){{$canonical}}@stop
@endisset
@extends('layouts.default')
@section('custom-css')
    <style>
        body{
            background-color: white;
            color: black;
        }
        .product_in_category {
            position: absolute;
            left: 0px;
            bottom: 0;
            background-color: white;
            background: #ffffff7a;
            width: 100%;
            color: black;
            padding: 30px;
            transition: all 400ms ease;
            text-transform: uppercase;
            font-size: 18px;
        }
        .product-image {
            width: 100%;
            min-height: 350px!important;
        }
    </style>
@stop
@section('title'){{$title}}@stop
@section('description'){{$description}}@stop
@section('custom-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/product.js"></script>
    <script>
        $(document).ready(function () {
            $('.cart_button').click(function (event) {
                event.preventDefault()
                addToCart()
            })
        })
        function addToCart() {
            let id = $('.details_name').data('id')
            let qty = parseInt($('#quantity_input').val())
            let total_qty = parseInt($('.cart-qty').text())
            total_qty += qty
            $('.cart-qty').text(total_qty)
            $.ajax({
                url: "{{route('addToCart')}}",
                type: "POST",
                data: {
                    id: id,
                    qty: qty,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data)
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }
    </script>
@stop

@section('content')
    <section class="top_menu_section"></section>
    <!--================ Product Area =================-->
    <section class="portfolio_details_area ">
        <div class="col" style="padding: 0;">
            <div class="portfolio_details_inner">
                <div class="row" style="margin: 0;">
                    <div id="categories_menu" class="col-md-3 sidebar left ">
                        <ul class="list-sidebar bg-defoult">
                            <li>
                                <h3 style="color:white;text-align: center;padding: 5px;">
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
                                            <li class=""><a href="{{$subcategory->url}}">{{$subcategory->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @php
                                    $cat_id = $cat_id + 1;
                                @endphp
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-9 p-3 order-first container order-md-last">
                        <div class="row">
                            <div class="col-md-12 banner_content text-left p-4">
                                <div class="page_link">
                                    @foreach($nav_links as $nav_link)
                                        <a class="product-nav-link" href={{$nav_link['url']}} >{{$nav_link['text']}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="left_img">
                                    <img class="img-fluid" src="{{$product->image_url}}" alt="{{$product->title}}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="portfolio_right_text details_name" data-id="{{$product->id}}>
                                    <h1>{{$product->title}}</h1>
                                    <p>{{$product->mini_description}}</p>
                                    <ul class="list">
                                        <li><span>Райтинг </span>: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                                        <li><span>Степень защиты </span> : {{$product->protection}} </li>
                                        <li><span>Грантия </span> : {{$product->warranty}} месяцев</li>
                                        <li><span>Производитель</span>: {{$product->manufacturer}}</li>
                                    </ul>
                                <br>
                                    <h3>Цена: {{$product->price}}тг</h3>
                                    <div class="product_quantity_container">
                                        <div class="product_quantity clearfix">
                                            <span>Кол.</span>
                                            <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                            <div class="quantity_buttons">
                                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                        <div class="button cart_button"><a href="#">Добавить</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>{!! nl2br(e(str_replace(',', ':', $product->description)))!!}</p>
                            </div>
                            <?php
                            $rec_count = 0;
                            ?>
                        @foreach($recommendations as $rec => $score)
                            @if($score==1.0 or $rec_count==3)
                                @continue
                            @endif

                            <?php
                            $rec_count++;
                            $cur_product = App\Product::where('id',$rec)->first();
                            ?>

                            <div class="projects_item col-md-4">
                                <img class="product-image" src="{{$cur_product->image_url}}"
                                     alt="Sirius Light Светильники {{$cur_product->title}}">
                                <a href="{{$cur_product->url}}">
                                    <div class="product_in_category">
                                        <h4 style="color: red;">{{intval($score*100)}}</h4>
                                        <h6>{{$cur_product->title}}</h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
