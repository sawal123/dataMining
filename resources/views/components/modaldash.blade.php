@props(['title', 'submit', 'button', 'close'])

    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>

            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">

                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{$title ?? $slot}}
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Masukan data yang sesuai!
                                </p>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="sm:mt-0 sm:ml-4 sm:text-left">
                        <form wire:submit='{{$submit}}'>
                            <input type="hidden" wire:model='idBarang'>
                            <x-input-label value="Kode Barang" />
                            <x-text-input id="kode" wire:model="angkaRandom" type="number" 
                                class="mb-3 w-full" />

                            <x-input-label value="Nama Barang" />
                            <x-text-input id="nama" wire:model="nama" type="text" class="mb-3 w-full" />

                            <x-input-label value="Stok Awal" />
                            <x-text-input id="stokAwal" wire:model="stokAwal" wire:change='hitungStokSisa'
                                type="number" class="mb-3 w-full" />

                            <x-input-label value="Stok Terjual" />
                            <x-text-input id="stokTerjual" wire:model="stokTerjual" wire:change='hitungStokSisa'
                                type="number" class="mb-3 w-full" />

                            <x-input-label value="Stok Tersisa" />
                            <x-text-input id="stokSisa" wire:model="stokSisa" type="number" readonly
                                class="mb-3 w-full" />
                            {{-- <p>{{$stokSisa}}</p> --}}


                            <div class="flex justify-between">
                                <button wire:click="{{$close}}" type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                    Close
                                </button>
                                <x-button-primary value="{{$button}}" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                </div>
            </div>
        </div>
    </div>
