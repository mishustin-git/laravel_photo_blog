<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageAbout;
use Illuminate\Support\Facades\Storage;


class PageAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_about = PageAbout::first();
        return view('adm_about',['title'=>$page_about['title'],'text'=>$page_about['text'],'image_url'=>$page_about['image_url']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request_array = $request->all();
        $page_about = PageAbout::first();
        $page_about->title = $request_array['title'];
        $page_about->text = $request_array['text'];
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
                $request->file('image')->storeAs('public/about', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'noimage.jpg';
            }
            // формируем название файла для базы данных
            $fileNameToBD = "/storage/about/".$fileNameToStore;
            // теперь записываем новую картинку
            $page_about->image_url = $fileNameToBD;
        }
        $page_about->save();
        return redirect()->route('adm_about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
