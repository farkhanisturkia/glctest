<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <Link href="{{ route('datacustomercreate') }}" class="px-4 py-2 bg-green-500 rounded text-white hover:bg-green-300 hover:text-black font-semibold">Input Data</Link>
                    <x-splade-table class="mt-4" :for="$datas" pagination-scroll="preserve">
                        <x-splade-cell identity as="$datas">
                            <img src="{{ asset($datas->ktps) }}" alt="{{ $datas->name }}" class="w-10 h-10 rounded-full">
                        </x-splade-cell>
                        <x-splade-cell home as="$datas">
                            <img src="{{ asset($datas->homes) }}" alt="{{ $datas->name }}" class="w-10 h-10 rounded-full">
                        </x-splade-cell>
                        <x-splade-cell actions as="$datas">
                            <Link href="{{ route('datacustomeredit', $datas) }}" class="mx-2 px-3 py-2 bg-blue-500 rounded text-white hover:bg-blue-300 hover:text-black font-semibold"> Edit </Link>
                            <x-splade-form 
                                action="{{ route('datacustomerdestroy', $datas) }}"
                                method="delete"
                                confirm="Hapus Data Customer"
                                confirm-text="Apa Kamu Yakin Untuk Menghapus Data?"
                                confirm-button="Ya"
                                cancel-button="Tidak">
                                <x-splade-button class="bg-red-500 rounded text-white hover:bg-red-300 hover:text-black"> Delete </x-splade-button>
                            </x-splade-form>
                        </x-splade-cell>
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
