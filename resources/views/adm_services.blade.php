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
                <form method="POST" action="/admin/services/update" style="display:flex;flex-direction:column">
                    @csrf
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title" value="{{$title}}"><br>
                    <label for="text">Text under title:</label><br>
                    <input type="text" id="text" name="text" value="{{$text}}"><br><br>
                    <input type="submit" value="Submit">
                </form>
                <table>
                    <tr>
                        <th>images</th>
                        <th>title</th>
                        <th>item1</th>
                        <th>item2</th>
                        <th>item3</th>
                        <th>actions</th>
                    </tr>
                    @foreach ($services as $service)
                    <tr>
                        <td>
                            <img src="{{$service['image_url']}}" alt="" width="320px">
                        </td>
                        <td>{{$service['title']}}</td>
                        <td>{{$service['item1']}}</td>
                        <td>{{$service['item2']}}</td>
                        <td>{{$service['item3']}}</td>
                        <td style="display:flex;flex-direction:column">
                            <a href="/admin/services/{{$service['id']}}">show</a>
                            <a href="/admin/services/delete/{{$service['id']}}">delete</a>
                            <a href="/admin/services/edit/{{$service['id']}}">edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <a href="/admin/services/add">add item</a>
            </div>
        </div>
    </div>
</x-app-layout>
