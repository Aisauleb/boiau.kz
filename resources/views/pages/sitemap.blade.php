{{ Request::header('Content-Type : application/xml') }}
<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
@isset($pages)
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        @foreach($pages as $page)
            <url>
                <loc>{{$page}}</loc>
                <changefreq>monthly</changefreq>
                <priority>1</priority>
            </url>
        @endforeach
        @foreach($categories as $category)
                <url>
                    <loc>{{ $category->url }}</loc>
                    <lastmod>{{ $category->updated_at->tz('GMT')->toAtomString() }}</lastmod>
                    <changefreq>monthly</changefreq>
                    <priority>1</priority>
                </url>
            @endforeach
        @isset($products)
            @foreach($products as $product)
                <url>
                    <loc>{{ $product->url }}</loc>
                    <lastmod>{{ $product->updated_at->tz('GMT')->toAtomString() }}</lastmod>
                    <changefreq>monthly</changefreq>
                    <priority>1</priority>
                </url>
            @endforeach
        @endisset
    </urlset>
@endisset
