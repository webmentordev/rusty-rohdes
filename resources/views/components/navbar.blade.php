<nav class="fixed z-50 top-0 left-0 w-full bg-black/80 backdrop-blur-sm">
    <div class="max-w-6xl m-auto w-full px-4 py-5 flex items-center justify-between">
        <a href="{{ route('home') }}" class="text-3xl rust text-green-500 border border-white/20 px-2 py-1">RustyRohdes</a>
        <ul class="bebas text-white flex items-center text-2xl 720px:hidden">
            <div x-data="{ open: false }" class="relative">
                <span x-on:mouseover="open = true" class="cursor-pointer">Connect+</span>
                <ul class="absolute roboto flex flex-col border border-white/10 top-8 text-center right-0 w-[300px] bg-black/30 backdrop-blur-md rounded-lg p-3" x-show="open" x-transition x-cloak x-on:mouseleave="open = false">
                    @foreach ($servers as $server)
                        @if ($loop->last)
                            <a class="text-base w-full text-center py-2" href="steam://connect/{{ $server->ip_address }}:{{ $server->port }}">{{ $server->name }}</a>
                        @else
                            <a class="text-base w-full py-1 pb-3 border-b border-white/10" href="steam://connect/{{ $server->ip_address }}:{{ $server->port }}">{{ $server->name }}</a>
                        @endif
                    @endforeach
                </ul>
            </div>
            <a class="ml-7" href="https://discord.gg/eD8U7Xkaaz" target="_blank" rel="nofollow">Discord</a>
            <a class="ml-7" href="https://rustyrohdes.tip4serv.com" target="_blank" rel="nofollow">OnlineStore / VIP Packages</a>
        </ul>

        <div class="720px:block hidden relative" x-data="{ active: false }">
            <img x-on:click="active = !active" class="cursor-pointer" width="40" src="https://api.iconify.design/ci:text-align-right.svg?color=%23ffffff">
            
            <div class="absolute flex border border-white/10 top-12 text-end right-0 w-[200px] bg-black/90 backdrop-blur-md rounded-lg p-3" x-on:click.self="active = false" x-show="active">
                <ul class="bebas text-white flex flex-col text-end w-full text-lg">
                    <div x-data="{ open: false }" class="relative mb-2">
                        <span x-on:click="open = !open" class="cursor-pointer py-1">Connect+</span>
                        <ul class="absolute roboto flex flex-col border border-white/10 top-8 text-center right-0 w-[300px] bg-black/30 backdrop-blur-md rounded-lg p-3" x-show="open" x-transition x-cloak x-on:click="open = false">
                            @foreach ($servers as $server)
                                @if ($loop->last)
                                    <a class="text-base w-full text-center py-2" href="steam://connect/{{ $server->ip_address }}:{{ $server->port }}">{{ $server->name }}</a>
                                @else
                                    <a class="text-base w-full py-1 pb-3 border-b border-white/10" href="steam://connect/{{ $server->ip_address }}:{{ $server->port }}">{{ $server->name }}</a>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <a class="py-1 mb-2" href="https://discord.gg/eD8U7Xkaaz" target="_blank" rel="nofollow">Discord</a>
                    <a class="py-1" href="https://rustyrohdes.tip4serv.com" target="_blank" rel="nofollow">OnlineStore / VIP Packages</a>
                </ul>
            </div>
        </div>
    </div>
</nav>