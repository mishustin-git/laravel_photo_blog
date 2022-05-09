<?php

namespace App\Http\Controllers;
// namespace App\Http\Models;

use Illuminate\Http\Request;
use App\Models\Slider;

class MainController extends Controller
{
    //
    public function index(){
        $slider_images = Slider::getImageUrl();
        return view('main',['slider_images' => $slider_images]);
        // print_r($slider_images);
    }
}
