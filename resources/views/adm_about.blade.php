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
                <form method="POST" action="/admin/about/update" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Image:</label><br>
                    <img id="img"src="{{$image_url}}" alt="" width="320px">
                    <div id="remove_img" onclick="hideImg()">Удалить изображение</div>
                    <input type="hidden" name="image_url" value="{{$image_url}}">
                    <input type="hidden" value="0" name="remove_img" id="input_remove_img">
                    <input id="add_img" type="file" id="image" name="image">
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title" value="{{$title}}"><br>
                    <label for="text">Text under title:</label><br>
                    <input type="text" id="text" name="text" value="{{$text}}"><br><br>
                    <!-- <input type="file" name="image"> -->
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
    </script>
</x-app-layout>
