<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('pages.home');
});
// Страница Всех категории
Route::get('/stroymarket', 'CategoryController@detail');
// Страница Категории
Route::get('/stroymarket/{slug}', 'CategoryController@detail');
// Страница Продукции
Route::get('/stroymarket/{category_slug}/{slug}', 'ProductController@detail');
// Страница Услуг
Route::get('/service/{slug}_{id}', 'ServiceController@detail');
// Страница О нас
Route::get('/about', function () {
    return view('pages.about');
});
// Страница О Контакты
Route::get('/contact', function () {
    return view('pages.contact');
});
// Страница Корзина
Route::get('/cart', 'CartController@index')->name('cartIndex');
Route::get('/cart_clear', 'CartController@clear')->name('cartClear');

Route::post('/add-to-cart', 'CartController@addToCart')->name('addToCart');
Route::match(['get','post'],'/send_to_mail', 'CartController@send')->name('senToMail');

Route::get('/sitemap.xml', 'CategoryController@sitemap');
Route::get('/sitemap_{category_slug}.xml', 'CategoryController@sitemap');
//Route::get('/elements', function () {
//    return view('pages.elements');
//});
//Route::get('/blog', function () {
//    return view('pages.blog');
//});
//Route::get('/single-blog', function () {
//    return view('pages.single-blog');
//});
//Route::get('/products', function () {
//    return view('pages.projects');
//});

Route::post('/contact_request', array('as' => 'feedback', 'uses' => 'ContactController@send'));
Route::post('/request', array('as' => 'sendRequest', 'uses' => 'ContactController@sendRequest'));


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
