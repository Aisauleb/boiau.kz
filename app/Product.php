<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    protected $table = 'products';
    protected $fillable = [
        'title',
        'mini_description',
        'description',
        'price',
        'image',
        'slug',
        'manufacturer',
        'power',
        'temperature',
        'protection',
        'warranty',
    ];

    public function getUrlAttribute(): string{
        return action('ProductController@detail', [$this->category()->first()->slug, $this->slug]);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute(): string{
        $image_url = $this->image;
        if ( strpos($image_url, 'http') === 0) {
            return $image_url;
        }
        return "/".$image_url;
    }
}
