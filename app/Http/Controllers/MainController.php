<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Main;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    //
    public function index(){
        $slider_images = Slider::getImageUrl();
        $title = Main::getTitle();
        $text = Main::getText();
        $button = Main::getButtonName();
        return view('main',['title'=>$title, 'text'=> $text,'button'=>$button,'slider_images' => $slider_images]);
    }
    public function change(){
        $slider_main = 1;
        $slider_images = Slider::getImageArray($slider_main);
        $title = Main::getTitle();
        $text = Main::getText();
        $button = Main::getButtonName();
        // return $slider_images[0]['active'];
        return view('adm_main',['title'=>$title, 'text'=> $text,'button'=>$button, 'slider_images'=>$slider_images]);
    }
    public function update(Request $request){
        $request_arr = $request->all();
        $title = $request_arr['title'];
        $text = $request_arr['text'];
        $button = $request_arr['button'];
        Main::Change($title, $text,$button);
        return redirect()->route('adm_main');
    }
}
