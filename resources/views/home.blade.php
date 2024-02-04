@extends('layouts.apps')
@section('content')
    <section class="w-full relative bg-cover bg-center bg-no-repeat min-h-screen" style="background-image: url({{ asset('images/background.webp') }})">
        <div class="absolute top-0 left-0 h-full w-full bg-black/40 backdrop-blur-sm"></div>
        <div class="max-w-6xl pt-[160px] m-auto px-4 h-full relative z-10">
            <div class="flex items-center mb-6">
                <div class="bg-green-500 w-full h-[2px]"></div>
                <h2 class="bebas mx-6 text-white text-3xl w-[500px]">Server Information</h2>
                <div class="bg-green-500 w-full h-[2px]"></div>
            </div>
            @if (count($servers))
                @if (count($servers) > 1)
                    <div class="grid grid-cols-2 gap-6">
                        @foreach ($servers as $item)
                            <div class="bg-black p-3 rounded-lg text-white relative flex flex-col">
                                <span class="absolute top-5 left-5 z-10">
                                    @if ($item['status'] == 'online')
                                        <p class="flex items-center p-2 py-1 font-semibold capitalize bg-green-600 rounded-lg">{{ $item['status'] }}</p>
                                    @else
                                        <p class="flex items-center p-2 py-1 font-semibold capitalize bg-red-600 rounded-lg">{{ $item['status'] }}</p>
                                    @endif
                                </span>
                                <span class="absolute top-5 right-5 z-10">
                                    <p class="flex items-center p-2 py-1 font-semibold capitalize bg-orange-600 rounded-lg">{{ $item['region'] }} Region</p>
                                </span>
                                @if ($item['background'] != 1)
                                    <img src="{{ $item['background'] }}" class="rounded-lg w-full h-[300px] object-cover" alt="{{ $item['name'] }} image">
                                @else
                                    <img src="{{ asset('images/server.png') }}" class="rounded-lg w-full h-[300px] object-cover" alt="image">
                                @endif
                                <div class="p-3 text-center">
                                    <h3 class="roboto font-semibold">{{ $item['name'] }}</h3>
                                </div>

                                <div class="bg-white/10 w-full h-[30px] overflow-hidden rounded-lg mb-3 relative flex items-center justify-center">
                                    <span class="font-bold">{{ $item['players'] }} / {{ $item['max'] }}</span>
                                    <div class="absolute h-full top-0 left-0 bg-green-500" style="width: {{ $item['percentage'] }}%"></div>
                                </div>

                                <a class="bg-green-500 py-3 px-4 text-center rounded-sm font-bold space text-black w-full" href="steam://connect/{{ $item['ip'] }}:{{ $item['port'] }}">connect {{ $item['ip'] }}:{{ $item['port'] }}</a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="max-w-2xl m-auto">
                        @foreach ($servers as $item)
                            <div class="bg-black p-3 rounded-lg text-white relative flex flex-col">
                                <span class="absolute top-5 left-5 z-10">
                                    @if ($item['status'] == 'online')
                                        <p class="flex items-center p-2 py-1 font-semibold capitalize bg-green-600 rounded-lg">{{ $item['status'] }}</p>
                                    @else
                                        <p class="flex items-center p-2 py-1 font-semibold capitalize bg-red-600 rounded-lg">{{ $item['status'] }}</p>
                                    @endif
                                </span>
                                <span class="absolute top-5 right-5 z-10">
                                    <p class="flex items-center p-2 py-1 font-semibold capitalize bg-orange-600 rounded-lg">{{ $item['region'] }} Region</p>
                                </span>
                                @if ($item['background'] != 1)
                                    <img src="{{ $item['background'] }}" class="rounded-lg w-full h-[300px] object-cover" alt="{{ $item['name'] }} image">
                                @else
                                    <img src="{{ asset('images/server.png') }}" class="rounded-lg w-full h-[300px] object-cover" alt="image">
                                @endif
                                <div class="p-3 text-center">
                                    <h3 class="roboto font-semibold">{{ $item['name'] }}</h3>
                                </div>

                                <div class="bg-white/10 w-full h-[30px] overflow-hidden rounded-lg mb-3 relative flex items-center justify-center">
                                    <span class="font-bold">{{ $item['players'] }} / {{ $item['max'] }}</span>
                                    <div class="absolute h-full top-0 left-0 bg-green-500" style="width: {{ $item['percentage'] }}%"></div>
                                </div>

                                <a class="bg-green-500 py-3 px-4 text-center rounded-sm font-bold space text-black w-full" href="steam://connect/{{ $item['ip'] }}:{{ $item['port'] }}">connect {{ $item['ip'] }}:{{ $item['port'] }}</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <div class="p-5 w-full h-[300px] flex justify-center rounded-2xl items-center bg-black">
                    <h2 class="text-orange-600 text-6xl rust rounded-lg 720px:text-4xl">Server Coming Soon</h2>
                </div>
            @endif
        </div>
    </section>
@endsection