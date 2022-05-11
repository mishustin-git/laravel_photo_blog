<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adm_service_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();
        $request_arr = $request->all();
        $service->title = $request_arr['title'];
        $service->item1 = $request_arr['item1'];
        $service->item2 = $request_arr['item2'];
        $service->item3 = $request_arr['item3'];
        // Работа с загрузкой картинки
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;// Upload Image$path = 
            $request->file('image')->storeAs('public/service', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }
        $fileNameToBD = "/storage/service/".$fileNameToStore;
        $service->image_url = $fileNameToBD;
        $service->save();
        return redirect()->route('adm_services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current = Service::find($id);
        if ($current){
            return view('adm_service',[ 'image_url'=>$current['image_url'],
                                        'title'=>$current['title'],
                                        'item1'=>$current['item1'],
                                        'item2'=>$current['item2'],
                                        'item3'=>$current['item3'],
                                        'id'=>$current['id']
                                    ]);
        }
        else
        {
            return redirect()->route('adm_services');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service  = Service::find($id)->toArray();
        if ($service){
            return view('adm_service_edit',['service'=>$service]);
        }
        else{
            return redirect()->route('adm_services');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request_arr = $request->all();
            // Вначале меняем значения не доходя до картинок
            $int_id = intval($request['id']);
            // Находим нужный нам слайд
            $current_service = Service::find($int_id);
            $current_service->title = $request_arr['service_title'];
            $current_service->item1 = $request_arr['item1'];
            $current_service->item2 = $request_arr['item2'];
            $current_service->item3 = $request_arr['item3'];
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
                    $request->file('image')->storeAs('public/service', $fileNameToStore);
                }
                else {
                    $fileNameToStore = 'noimage.jpg';
                }
                // формируем название файла для базы данных
                $fileNameToBD = "/storage/service/".$fileNameToStore;
                // теперь записываем новую картинку
                $current_service->image_url = $fileNameToBD;
            }
            // Вконце сохраняем
            $current_service->save();
            return redirect('/admin/services/'.$request['id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //находим нужный service по id
        $service_to_delete = Service::find($id);
        $img_url = str_replace('/storage','public',$service_to_delete->image_url);
        // если такое изображение есть, тогда удаляем
        if(Storage::exists($img_url)){
            Storage::delete($img_url);
        }
        $service_to_delete->delete();
        return redirect()->route('adm_services');
    }
}
