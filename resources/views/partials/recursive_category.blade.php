<

@if (count($category->children()->get())> 0)
@endif
<ul class="dropdown-menu">
    @foreach($category->children()->get() as $category)
            @include('partials.recursive_category', $category)
        @endforeach
</ul>
</li>
