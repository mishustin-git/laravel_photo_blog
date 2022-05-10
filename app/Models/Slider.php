<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slider';
    static function getImageUrl($slider_id){
        $int_slider_id = intval($slider_id);
        $slider_images = Slider::where([

            ['active', '1'],
    
            ['sldier_id', $int_slider_id]
    
        ])
            ->orderBy('slide_order')
            ->get('image_url')
            ->toArray();
        return $slider_images;
    }
    static function getImageArray(int $slider_id){
        // $slider_images = Slider::all()->toArray();
        $slider_images = Slider::where("sldier_id",$slider_id)->get()->toArray();
        return $slider_images;
    }
    static function getSlide(int $id){
        $slider = Slider::where('id',$id)->get()->toArray();
        return $slider;
    }
}
