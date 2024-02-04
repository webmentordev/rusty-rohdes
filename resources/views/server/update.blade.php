<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Server') }}
            </h2>
            <a href="{{ route('server') }}" class="py-2 px-3 rounded-lg text-white bg-black">Go Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl mb-3 font-semibold">Update the Server</h2>
                    @if (session('success'))
                        <p class="p-4 bg-green-600/20 text-center mb-3 border border-green-600 text-green-700">{{ session('success') }}</p>
                    @endif
                    <form action="{{ route('update.server', $server->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="w-full mb-3">
                            <x-input-label for="name" :value="__('Server short name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$server->name" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>


                        <div class="w-full mb-3">
                            <x-input-label for="ip" :value="__('Server IP Address')" />
                            <x-text-input id="ip" class="block mt-1 w-full" type="text" name="ip" :value="$server->ip_address" required />
                            <x-input-error :messages="$errors->get('ip')" class="mt-2" />
                        </div>

                        <div class="w-full mb-3">
                            <x-input-label for="port" :value="__('Server Port')" />
                            <x-text-input id="port" class="block mt-1 w-full" type="number" name="port" :value="$server->port" required />
                            <x-input-error :messages="$errors->get('port')" class="mt-2" />
                        </div>

                        <div class="w-full mb-3">
                            <x-input-label for="battlematric" :value="__('Battlematric ID')" />
                            <x-text-input id="battlematric" class="block mt-1 w-full" type="number" name="battlematric" :value="$server->battlematric" required />
                            <x-input-error :messages="$errors->get('battlematric')" class="mt-2" />
                        </div>

                        <x-primary-button class="mt-3">
                            {{ __('Update') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>