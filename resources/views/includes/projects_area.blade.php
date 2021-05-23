@php
    use Illuminate\Support\Facades\DB;
    if (! isset($products)){
        $products = App\Product::all()->random(21);
    }
@endphp
<section class="projects_area {{$pad_top}}">
    <div class="container">
        @if($project_area_title)
            <div class="main_title">
                <h2>{{$project_area_h2}}</h2>
                <p>{{$project_area_p}}</p>
            </div>
        @endif
        <div class="row">
            @foreach($products as $product)

                <div class="projects_item col-md-3">
                    <img class="product-image" src="{{$product->image_url}}" alt="Boiau CORP Продукции {{$product->title}}">
                    <a href="{{$product->url}}">
                        <div class="product_in_category">
                            <h4>{{$product->title}}</h4>
                        </div>
                        <div class="hover">
                            <h6>{{$product->title}}</h6>
                            <p>
                                @php
                                    $text = $product->mini_description;
                                    if(strlen($text)>120){
                                        $text =  substr($text, 0, 120)."...";
                                    }
                                    echo $text;
                                @endphp
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
