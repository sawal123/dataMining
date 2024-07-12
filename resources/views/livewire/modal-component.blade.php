<div>
    @if (session()->has('status'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 5.707 8.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l7-7a1 1 0 000-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium">Success!</span> {{ session('status') }}
            </div>
        </div>
    @endif
    <div class="flex justify-between">
        <button wire:click='openModal'
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
            + Tambah Data
        </button>


        {{-- <a href="cluster" wire:navigate
            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Proses Cluster
    </a> --}}
    </div>

    @if ($isOpen)
       <x-modaldash title="Tambah Data" submit="save" button="Simpan" close="closeModal" />
    @endif


    @include('livewire.dashboard.tableData')




</div>
