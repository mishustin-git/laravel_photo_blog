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
                img
                <img src="{{$image_url}}" alt="" style="width:320px">
                title
                {{$title}}
                item1
                {{$item1}}
                item2
                {{$item2}}
                item3
                {{$item3}}
            </div>
        </div>
    </div>
</x-app-layout>
