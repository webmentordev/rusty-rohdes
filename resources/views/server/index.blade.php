<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Servers') }}
            </h2>
            <a href="{{ route('server.create') }}" class="py-2 px-3 rounded-lg text-white bg-black">Add server</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-3 font-semibold">Our Servers</h2>
                    @if (count($servers))
                        <table class="w-full">
                            <tr class="bg-black text-white text-start">
                                <th class="text-start p-2">Name</th>
                                <th class="text-start">IPAddress</th>
                                <th class="text-start">Port</th>
                                <th class="text-start">Battlematric</th>
                                <th class="text-end">Delete</th>
                                <th class="text-end p-2">Edit</th>
                            </tr>

                            @foreach ($servers as $item)
                                <tr class="odd:bg-gray-100">
                                    <td class="text-start p-2">{{ $item->name }}</td>
                                    <td class="text-start">{{ $item->ip_address }}</td>
                                    <td class="text-start">{{ $item->port }}</td>
                                    <td class="text-start">{{ $item->battlematric }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('delete.server', $item->id) }}" method="post" id="form">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-600 text-white rounded-lg p-1 px-2">Delete</button>
                                        </form>
                                    
                                    
                                    </td>
                                    <td class="text-end p-2"><a href="{{ route('server.update', $item->id) }}" class="text-indigo-600 underline">Update</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        {{ __('Servers does not exist!') }}
                    @endif
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var form = document.getElementById('form');
                form.addEventListener('submit', function (event) {
                    var isConfirmed = confirm('Are you sure you want to delete this server?');
                    if (!isConfirmed) {
                        event.preventDefault();
                    }
                });
            });
        </script>
    </div>
</x-app-layout>