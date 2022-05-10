<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Administrating main_page
                </div>
                <form method="POST" action="/updatemain" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title" value="{{$title}}"><br>
                    <label for="text">Text under title:</label><br>
                    <input type="text" id="text" name="text" value="{{$text}}"><br><br>
                    <label for="button">Button text:</label><br>
                    <input type="text" id="button" name="button" value="{{$button}}"><br><br>
                    <!-- <input type="file" name="image"> -->
                    <input type="submit" value="Submit">
                </form>
                <table>
                    <tr>
                        <th>image</th>
                        <th>slider_order</th>
                        <th>active</th>
                        <th>actions</th>
                    </tr>
                    @foreach($slider_images as $slider_image)
                        <tr>
                            <td><img src="{{$slider_image['image_url']}}" alt="" style="width:320px"></td>
                            <td>{{$slider_image['slide_order']}}</td>
                            <td>{{$slider_image['active']}}</td>
                            <td style="display:flex;flex-direction:column;">
                                <form action="slide/delete" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$slider_image['id']}}">
                                    <button>delete</button>
                                </form>
                                <a href="/admin/slide/update?id={{$slider_image['id']}}">update</a>
                                <a href="/admin/slide?id={{$slider_image['id']}}">look</a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    <a href="/admin/slide/add">add item</a>
            </div>
        </div>
    </div>
</x-app-layout>
