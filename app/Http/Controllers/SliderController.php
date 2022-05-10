<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index(Request $request){
        if ($request['id']){
            $int_id = intval($request['id']);
            $slide_array = Slider::getSlide($int_id);
            if ($slide_array)
                return view('slider',['slider'=>$slide_array[0]]);
            else
                return redirect()->route('adm_main');
        }
        else{
            return redirect()->route('adm_main');
        }
    }
    public function delete(Request $request){
        if($request['id'])
        {
            $slide = Slider::where('id',$request['id'])->delete ();
            return redirect()->route('adm_main');
        }
        else{
            return redirect()->route('adm_main');
        }
    }
    public function add(Request $request){
        if ($request->isMethod('GET')){
            return view('slideradd');
        }
        else if ($request->isMethod('POST')){
            $main_slider=1;
            $request_arr = $request->all();
            if ($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName ();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename. '_'. time().'.'.$extension;// Upload Image$path = 
                $request->file('image')->storeAs('public/slider', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'noimage.jpg';
            }
            $fileNameToBD = "/storage/slider/".$fileNameToStore;
            $slider_order = $request_arr['slider_order'];
            $active = 0;
            if (isset($request_arr['checkbox'])){
                $active = 1;
            }
            $new_slide = new Slider;
            $new_slide->image_url = $fileNameToBD;
            $new_slide->slide_order=$slider_order;
            $new_slide->active=$active;
            $new_slide->sldier_id=$main_slider;
            $new_slide->save();
            return redirect()->route('adm_main');
        }
        else{
            return redirect()->route('adm_main');
        }
    }
    public function update(Request $request){
        if ($request->isMethod('GET')){
            if ($request['id']){
                $int_id = intval($request['id']);
                $slide_array = Slider::getSlide($int_id);
                if ($slide_array)
                    return view('sliderupdate',['slider'=>$slide_array[0]]);
                else{
                    return redirect()->route('adm_main');
                }
                    return redirect()->route('adm_main');
            }
            else{
                return redirect()->route('adm_main');
            }
        }
        else if ($request->isMethod('POST')){
            $request_arr = $request->all();
            // Вначале меняем значения не доходя до картинок
            $int_id = intval($request['id']);
            // Находим нужный нам слайд
            $current_slide = Slider::find($int_id);
            $current_slide->slide_order = intval($request_arr['slider_order']);
            $active = 0;
            if (isset($request_arr['checkbox'])){
                $active = 1;
            }
            $current_slide->active=$active;
            // return $current_slide;
            // Если в форме было удалено изображение
            // Тогда и мы удаляем его из хранилища
            if ($request['remove_img'] == 1){
                // изменяем путь вместо "storage" ставим "public"
                $img_url = str_replace('/storage','public',$request['image_url']);
                // если такое изображение есть, тогда удаляем
                if(Storage::exists($img_url)){
                    Storage::delete($img_url);
                }
                // Теперь загружаем картинку
                if ($request->hasFile('image')) {
                    $filenameWithExt = $request->file('image')->getClientOriginalName ();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $fileNameToStore = $filename. '_'. time().'.'.$extension;// Upload Image$path = 
                    $request->file('image')->storeAs('public/slider', $fileNameToStore);
                }
                else {
                    $fileNameToStore = 'noimage.jpg';
                }
                // формируем название файла для базы данных
                $fileNameToBD = "/storage/slider/".$fileNameToStore;
                // теперь записываем новую картинку
                $current_slide->image_url = $fileNameToBD;
            }
            // Вконце сохраняем
            $current_slide->save();
            return redirect('/admin/slide?id='.$request['id']);
        }
    }
}
