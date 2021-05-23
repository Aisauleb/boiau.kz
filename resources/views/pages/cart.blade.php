@extends('layouts.default')

@section('title', 'Cart')

@section('content')
    <style>
        body{
            background-color: #030F27;
        }
        div{
            position: relative;
        }

    </style>
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(img/cart.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="/">Главная</a></li>
                                        <li>Корзина</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Info -->

    <div class="cart_info">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Продукт</div>
                        <div class="cart_info_col cart_info_col_price">Цена</div>
                        <div class="cart_info_col cart_info_col_quantity">Количества</div>
                        <div class="cart_info_col cart_info_col_total">Общий</div>
                    </div>
                </div>
            </div>
            <div class="row cart_items_row">
                <div class="col">
                    @foreach($items as $item)
                    <!-- Cart Item -->
                    <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                        <!-- Name -->
                        <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_item_image">
                                <div><img src="{{$item->attributes->image_url}}" alt=""></div>
                            </div>
                            <div class="cart_item_name_container">
                                <div class="cart_item_name"><a href="{{$item->product_url}}">{{$item->name}}</a></div>
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="cart_item_price">{{$item->price}} тг</div>
                        <!-- Quantity -->
                        <div class="cart_item_quantity">
                            {{$item->quantity}} шт.
                        </div>
                        <!-- Total -->

                        <div class="cart_item_total">{{$item->attributes->subtotal}} тг</div>
                    </div>
                        @endforeach
                </div>
            </div>
            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="button continue_shopping_button"><a href="/stroymarket">Продолжить покупки</a></div>
                        <div class="cart_buttons_right ml-lg-auto">
                            <div class="button clear_cart_button"><a href="{{route('cartClear')}}">Очистить корзину</a></div>
                            <div class="button update_cart_button"><a href="/cart">Обновить корзину</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_extra">
                <div class="col-lg-6 offset-lg-2">
                    <div class="cart_total">
                        <div class="section_title">Всего в корзине</div>
                        <div class="section_subtitle">Окончательная информация</div>

                        <div class="cart_total_container">
                            <ul>
                            <form class="row contact_form" action="{{url('/send_to_mail')}}" method="post" id="contactForm" novalidate="novalidate">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Ваше имя">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Ваш номер телефон">
                                    </div>
                                </div>
                                <div class=""><button type="submit" value="submit" class="btn submit_btn">Оформить заказ</button></div>
                            </form>
                            </ul>
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">К оплате</div>
                                    <div class="cart_total_value ml-auto">{{$total}} тг</div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('after-footer')
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Спасибо!</h2>
                    <p>Ваше заявка оставлена, вам позвонить в ближайщее время.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Извините !</h2>
                    <p> Что то пощло не так, попробуйте дозваниться или написать на Whatsapp </p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('custom-js')
    <script src="js/cart.js"></script>
@stop
