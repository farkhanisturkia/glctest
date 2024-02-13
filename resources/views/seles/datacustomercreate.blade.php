<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-splade-form action="{{ route('datacustomerstore') }}" class="space-y-4">
                        <x-splade-input id="name" name="name" label="Name" required />
                        <x-splade-input id="telephone" name="telephone" label="Nomor Telephone" required />
                        <x-splade-input id="address" name="address" label="Address" required />
                        <div class="space-y-4 xl:space-y-2 xl:grid xl:gap-4 xl:grid-auto-fit">
                            <x-splade-select name="paket_id" label="Package" class="xl:mt-[8px]" required>
                                @foreach ($pakets as $paket)
                                    <option value="{{ $paket->id }}">{{ $paket->name }} for {{ $paket->price }}</option>
                                @endforeach
                            </x-splade-select>
                            <x-splade-file id="ktp" name="ktp" label="Identity photo" filepond preview accept="image/png" required/>
                            <x-splade-file id="home" name="home" label="Home photo" filepond preview accept="image/png" required/>
                        </div>
                        <x-splade-submit label="Input" />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
