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
                <form method="POST" action="/admin/slide/update" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Image:</label><br>
                    <img id="img"src="{{$slider['image_url']}}" alt="" width="320px">
                    <div id="remove_img" onclick="hideImg()">Удалить изображение</div>
                    <input type="hidden" name="image_url" value="{{$slider['image_url']}}">
                    <input type="hidden" value="0" name="remove_img" id="input_remove_img">
                    <input type="hidden" name="id" value="{{$slider['id']}}">
                    <input id="add_img" type="file" id="image" name="image">
                    <label for="slider_order">slider_order:</label><br>
                    <input type="text" id="slider_order" name="slider_order" value="{{$slider['slide_order']}}"><br>
                    <label for="checkbox">Active:</label><br>
                    @if ($slider['active'] == 1)
                        <input type="checkbox" id="checkbox" name="checkbox" checked value="1"><br><br>
                    @else
                    <input type="checkbox" id="checkbox" name="checkbox" value="1"><br><br>
                    @endif
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <style>
        #add_img{
            display:none;
        }
        #add_img.active{
            display:block;
        }
        #img{
            display: block;
        }
        #img.remove{
            display: none;
        }
        #remove_img{
            display: block;
            cursor: pointer;
        }
        #remove_img.hide{
            display: none;
        }
    </style>
    <script>
        function hideImg(){
            document.getElementById('img').classList.add('remove');
            document.getElementById('add_img').classList.add('active');
            document.getElementById('remove_img').classList.add('hide');
            document.getElementById("input_remove_img").value = 1;
        }
        // document.getElementById('remove_img').onclick = hideImg();
    </script>
</x-app-layout>
