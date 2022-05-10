<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;
    protected $table = 'main';
    static function getTitle(){
        $title = Main::first()->toArray();
        return $title['title'];
    }
    static function getText(){
        $title = Main::first()->toArray();
        return $title['text'];
    }
    static function getButtonName(){
        $title = Main::first()->toArray();
        return $title['button_name'];
    }
    static function Change(string $title, string $text, string $button){
        $main = Main::first();
        $main->title = $title;
        $main->text = $text;
        $main->button_name = $button;
        $main->save();
    }
}
