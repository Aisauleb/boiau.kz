<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Service extends Model{
    protected $table = 'services';
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image',
        'image_alt',
        'slug',
    ];

    public function getUrlAttribute(): string{
        return action('ServiceController@detail', [$this->slug, $this->id]);
    }
}
