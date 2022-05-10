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

                <form method="POST" action="/admin/slide/add" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Image:</label><br>
                    <input type="file" id="image" name="image">
                    <label for="slider_order">slider_order:</label><br>
                    <input type="text" id="slider_order" name="slider_order" value=""><br>
                    <label for="checkbox">Active:</label><br>
                    <input type="checkbox" id="checkbox" name="checkbox" value="1"><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
