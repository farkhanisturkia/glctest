<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Package') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form action="{{ route('datapaketstore') }}" class="grid gap-4 grid-auto-fit-xl">
                        <x-splade-input id="name" name="name" label="Package Name" required />
                        <x-splade-input id="price" name="price" label="Package Price" required />
                        <x-splade-submit class="mt-[27px]" label="Submit" />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-splade-table class="mt-4" :for="$datas" pagination-scroll="preserve"></x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
