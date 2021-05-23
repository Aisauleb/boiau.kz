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
        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        $its = \Cart::getContent();
        $total = \Cart::getTotal();
        $text = $request->name . ' Оформил заказ. Номер телефона: ' . $request->phone . "\n ";
        $id = 1;
        foreach ($its as $k) {
            $text .= $id . ". " . $k["name"] . " [" . $k["quantity"] . " шт.] - " . $k["price"] . ' = ' . $k["attributes"]["subtotal"] . "\n";
            $id = $id + 1;
        }
        $text .= 'Общая сумма: ' . $total;

        $result = CartController::execRest("crm.lead.add", array(
            'fields' => array(
                "TITLE" => $_POST["name"],
                "NAME" => $_POST["name"],
                "UF_CRM_1621778409" => $text,
                "PHONE" => array(array("VALUE" => $_POST["phone"], "VALUE_TYPE" => "WORK")),
            )
        ));
        \Cart::clear();
        return redirect()->back();
    }


        public function execRest($method, $params)
        {
            $queryUrl = 'https://boiau.bitrix24.ru/rest/1/7zztvscho2hjr3gb/' . $method . '.json';
            $queryData = http_build_query($params);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_POST => 1,
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $queryUrl,
                CURLOPT_POSTFIELDS => $queryData
            ));

            $res = curl_exec($curl);
            curl_close($curl);
            return json_decode($res, true);
        }

}
