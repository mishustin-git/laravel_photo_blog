<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Main;
use App\Models\PageAbout;
use App\Models\PageServices;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    //
    public function index(){
        $main_slider=1;
        $slider_images = Slider::getImageUrl($main_slider);
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
    public function about(){
        $page = PageAbout::first()->toArray();
        return view('about',['title'=>$page['title'],'text'=>$page['text'],'image_url'=>$page['image_url']]);
    }
    public function services(){
        $page = PageServices::first()->toArray();
        $services = Service::all()->toArray(); 
        return view('services',['title'=>$page['title'],'text'=>$page['text'],'services'=>$services]);
    }
}
