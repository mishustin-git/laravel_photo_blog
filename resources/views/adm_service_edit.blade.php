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
                <!-- /admin/slide/update -->
                <form method="POST" action="/admin/services/upgrade" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Image:</label><br>
                    <img id="img"src="{{$service['image_url']}}" alt="" width="320px">
                    <div id="remove_img" onclick="hideImg()">Удалить изображение</div>
                    <input type="hidden" name="image_url" value="{{$service['image_url']}}">
                    <input type="hidden" value="0" name="remove_img" id="input_remove_img">
                    <input type="hidden" name="id" value="{{$service['id']}}">
                    <input id="add_img" type="file" id="image" name="image">
                    <label for="service_title">service_title:</label><br>
                    <input type="text" id="service_title" name="service_title" value="{{$service['title']}}"><br>
                    <label for="item1">item1:</label><br>
                    <input type="text" id="item1" name="item1" value="{{$service['item1']}}"><br>
                    <label for="item2">item2:</label><br>
                    <input type="text" id="item2" name="item2" value="{{$service['item2']}}"><br>
                    <label for="item3">item3:</label><br>
                    <input type="text" id="item3" name="item3" value="{{$service['item3']}}"><br>
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
