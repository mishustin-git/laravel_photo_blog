<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slider';
    static function getImageUrl(){
        $slider_images = Slider::where('active', 1)
               ->orderBy('slide_order')
               ->get('image_url')
               ->toArray();
        return $slider_images;
    }
}
