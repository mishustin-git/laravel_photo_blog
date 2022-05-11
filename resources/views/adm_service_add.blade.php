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

                <form method="POST" action="/admin/services/store" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <label for="image">Image:</label><br>
                    <input type="file" id="image" name="image">
                    <label for="title">title:</label><br>
                    <input type="text" id="title" name="title" value=""><br>
                    <label for="item1">item1:</label><br>
                    <input type="text" id="item1" name="item1" value=""><br>
                    <label for="item2">item2:</label><br>
                    <input type="text" id="item2" name="item2" value=""><br>
                    <label for="item3">item3:</label><br>
                    <input type="text" id="item3" name="item3" value=""><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
