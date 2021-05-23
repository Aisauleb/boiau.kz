<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Http;

class ProductController extends BaseController
{
    public function detail($category_slug="", $slug="")
    {
        if($slug==""){
            return view('pages.product-detail');
        }
        $product = Product::where('slug',$slug)->first();
        $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get();
        $client = new \GuzzleHttp\Client();
        $url = 'http://easypick.kz/smart/'.strval($product->id);
        $response = $client->get($url)->getBody();
        $obj = json_decode($response);
        $recommendations = $obj->response->data;
        return view('pages.product-detail-page')
            ->withProduct($product)
            ->withCanonical($product->url)
            ->withRecommendations($recommendations)
            ->withMenuCategories($categories);
    }
}
