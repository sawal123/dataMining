<div>

    @include('components.style-tabel')

    <table class="responstable" style="border: 1px solid black !important">

        <tr>
            <th style="width: 10%">No</th>
            <th style="width: 10%">Kode</th>
            <th style="width: 30%">Nama Barang</th>
            <th style="width: 10%">Stok Awal</th>
            <th style="width: 10%">Stok Terjual</th>
            <th style="width: 10%">Stok Tersisa</th>
            <th>Aksi</th>
        </tr>

        @foreach ($data as $key => $item)
            <tr key='{{$key}}'>
                <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                <td> {{ $item['kode'] }}</td>
                <td> {{ $item['nama_barang'] }}</td>
                <td>{{ $item['stok_awal'] }}</td>
                <td>{{ $item['stok_terjual'] }}</td>
                <td>{{ $item['stok_akhir'] }}</td>
                <td class="">
                    <x-danger-button value="Delete" wire:click='delete({{ $item->id }})'
                        wire:confirm="Are you sure you want to delete this post?" class="mx-1" />
                    <x-button-primary value="Edit" wire:click='modalEdit({{ $item->id }})' class="mx-2" />

                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links() }}
    @if ($openEdit)
        <x-modaldash title="Edit Data" submit="edit" button="Update" close="closeEdit" />
    @endif
</div>
