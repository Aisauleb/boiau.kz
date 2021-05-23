@php
    if (! isset($categories)){
        $categories = App\Category::all()->random(1);
    }
@endphp
<section class="projects_area {{$pad_top}} p_60">
    <div class="container">
    @if($project_area_title)
        <div class="main_title">
            <h2>{{$project_area_h2}}</h2>
            <p>{{$project_area_p}}</p>
        </div>
    @endif
    <div class="row m0">
        @foreach($categories as $category)
            <div class="projects_item col-md-4">
                <img src="{{$category->image}}" alt="Boiau CORP {{$category->name}}">
                <a href="{{$category->url}}">
                    <div class="product_category">
                        <h4>{{$category->name}}</h4>
                        <p>{{$category->mini_description}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    </div>
</section>
