<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index(){

        if(!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $its = \Cart::getContent();
        $total = \Cart::getTotal();

        //dd($its);
        return view('pages.cart')
            ->withItems($its)
            ->withTotal($total);
    }

    public function addToCart(Request $request){
        $product = Product::where('id', $request->id)->first();
        if(!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' =>  (int) $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => [
                'img' => $product->image,
                'image_url' =>$product->image_url,
                'subtotal' => (int) $request->qty * (int) $product->price ,
                'product_url' => $product->url,
            ]

        ]);
        $items = \Cart::getContent();
        return response()->json($items);
    }
    public function clear(){
        if(!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        \Cart::clear();
        return redirect()->back();
    }
    public function send(Request $request)
    {
        if(!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $its = \Cart::getContent();
        $total = \Cart::getTotal();
        $text = $request->name . ' Оформил заказ. Номер телефона: ' . $request->phone . "\n ";
        $id = 1;
        foreach ($its as $k){
                $text .= $id.". ".$k["name"]." [".$k["quantity"]." шт.] - ".$k["price"]. ' = ' . $k["attributes"]["subtotal"] . "\n";
                $id = $id + 1;
        }
        $text .=  'Общая сумма: ' . $total;
        //dd($text);
        Mail::raw($text, function ($message) {
            $message->from(env('MAIL_USERNAME', ''), "Boiau.kz");
            $message->to('aisauleb19@gmail.com');
        });
        \Cart::clear();
        return redirect()->back();
    }

}
