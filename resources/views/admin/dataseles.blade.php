<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seles') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <p class="text-center font-semibold text-xl pb-5">New data seles</p> --}}
                    <x-splade-form action="{{ route('dataselesstore') }}" class="grid gap-4 grid-auto-fit-xl">
                        <x-splade-input id="nip" name="nip" label="NIP" required />
                        <x-splade-input id="password" type="password" name="password" label="Password" required />
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
                    <x-splade-table class="mt-4" :for="$datas" pagination-scroll="preserve">
                        <x-splade-cell actions as="$datas">
                            <Link href="{{ route('dataselesshow', $datas) }}" class="mx-2 px-3 py-2 bg-blue-500 rounded text-white hover:bg-blue-300 hover:text-black font-semibold"> Show </Link>
                            <x-splade-form 
                                action="{{ route('dataselesdestroy', $datas) }}"
                                method="delete"
                                confirm="Hapus Data Seles"
                                confirm-text="Apa Kamu Yakin Untuk Menghapus Data?"
                                confirm-button="Ya"
                                cancel-button="Tidak">
                                <x-splade-button class="bg-red-500 rounded text-white hover:bg-red-300 hover:text-black"> Delete </x-splade-button>
                            </x-splade-form>
                            <Link href="{{ route('dataselesdownload', $datas) }}" class="mx-2 px-3 py-2 bg-green-500 rounded text-white hover:bg-green-300 hover:text-black font-semibold"> Download </Link>
                        </x-splade-cell>
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
