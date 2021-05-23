<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Category extends Model{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'seo_description',
        'description',
        'image',
        'slug',
        'parent_id',
    ];
    public function children(){
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function parent(){
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function childrenRecursive(){
        return $this->children()->with('childrenRecursive');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getImageUrlAttribute(): string{
        $image_url = $this->image;
        if ( strpos($image_url, 'http') === 0) {
            return $image_url;
        }
        return "/".$image_url;
    }

    public function getUrlAttribute(): string{
        return action('CategoryController@detail', [$this->slug]);
    }



}
