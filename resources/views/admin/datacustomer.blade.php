<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>

    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-splade-table class="mt-4" :for="$datas" pagination-scroll="preserve">
                        <x-splade-cell identity as="$datas">
                            <img src="{{ asset($datas->ktp) }}" alt="{{ $datas->name }}" class="w-10 h-10 rounded-full">
                        </x-splade-cell>
                        <x-splade-cell home as="$datas">
                            <img src="{{ asset($datas->home) }}" alt="{{ $datas->name }}" class="w-10 h-10 rounded-full">
                        </x-splade-cell>
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
