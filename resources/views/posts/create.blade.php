
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                <form method="post" action="{{ route('posts.store') }}" class="mt-6 space-y-6">
                @csrf
                @method('POST')

                <div>
                    <x-input-label for="animal_type" :value="__('animal_type')" />
                    <select id="animal_type" name="animal_type" class="mt-1 block w-full" required>
                    <option value="" disabled selected>Select Animal Type</option>
                    @foreach($animal_types as $type)
                        <option value="{{ $type }}">
                            {{ $type }}
                        </option>
                    @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('animal_type')" />
                </div>
                <div>
                    <x-input-label for="age" :value="__('age')" />
                    <x-text-input id="name" name="age" type="number" class="mt-1 block w-full" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('age')" />
                </div>
                <div>
                    <x-input-label for="number_in_herd" :value="__('number_in_herd')" />
                    <x-text-input id="name" name="number_in_herd" type="number" class="mt-1 block w-full" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('number_in_herd')" />
                </div>
                <div>
                    <x-input-label for="price_per_kilo" :value="__('price_per_kilo')" />
                    <x-text-input id="name" name="price_per_kilo" type="number" class="mt-1 block w-full" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('price_per_kilo')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>