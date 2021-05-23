<?php
namespace App\Http\Controllers;
use App\Category;
use App\Service;
use App\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends BaseController
{
    public function detail($slug="",$request="")
    {
        $request = Request::input('q');
        $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get();
        $category = Category::where('slug',$slug)->with('childrenRecursive')->get();
        if(count($category)>0){
            $category = $category[0];
            $child_categories = $category->children()->get();
            $child_array = [];
            foreach($child_categories as $arr){
                array_push($child_array , $arr["id"]);
            }
            array_push($child_array , $category["id"]);
            $paginated_products = Product::whereIn('category_id', $child_array )->paginate(8);
            return view('pages.category')
                ->withMenuCategories($categories)
                ->withCategory($category)
                ->withCanonical($category->url)
                ->withPaginated($paginated_products)
                ->withSearch($request);
        }else{
            if($slug==""){
                $massage = "Все материалы от Boiau CORP(Бояу КОРП)";
            }else{
                $massage = "";
            }
            $query = Product::query();
            $columns = ['title', 'mini_description', 'description', 'manufacturer'];
            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $request . '%');
            }
            $paginated_products = $query->paginate(8);
            $paginated_products->withPath("?q=".$request);
            return view('pages.category')
                ->withMenuCategories($categories)
                ->withPaginated($paginated_products)
                ->withSearch($request);
        }
    }

    public function sitemap($category_slug="")
        {
            $products = [];
            $pages = [
            "https://boiau.kz/about",
            "https://boiau.kz/contact",
            ];
            $services = Service::all();
            foreach($services as $service){
                array_push($pages, $service->url);
            }
            $categories = Category::all();
            foreach($categories as $category){
                if(count($category->products()->get())>0){
                    array_push($products, ...$category->products()->get());
                }
            }
            return view('pages.sitemap')
            ->withCategories($categories)
            ->withProducts($products)
            ->withPages($pages);
        }
}
