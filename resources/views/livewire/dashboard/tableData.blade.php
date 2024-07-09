<div>
    <style>
        /* General styles */
        body {
            padding: 0 2em;
            font-family: Arial, sans-serif;
            color: #024457;
            background: #f2f2f2;
        }

        h1 {
            font-family: Verdana;
            font-weight: normal;
            color: #024457;
        }

        h1 span {
            color: #167F92;
        }

        /* Table styles */
        .responstable {
            margin: 1em 0;
            width: 100%;
            overflow: hidden;
            background: #FFF;
            color: #024457;
            border-radius: 10px;
            border: 1px solid #000000;
        }

        .responstable tr {
            border: 1px solid #D9E4E6;
        }

        .responstable tr:nth-child(odd) {
            background-color: #EAF3F3;
        }

        .responstable th {
            display: none;
            border: 2px solid #FFF;
            background-color: #167F92;
            color: #FFF;
            padding: 1em;
        }

        .responstable th:first-child {
            display: table-cell;
            text-align: center;
        }

        .responstable th:nth-child(2) {
            display: table-cell;
        }

        .responstable th:nth-child(2) span {
            display: none;
        }

        .responstable th:nth-child(2):after {
            content: attr(data-th);
        }

        @media (min-width: 480px) {

            .responstable th,
            .responstable td {
                display: table-cell;
                padding: 1em;
            }

            .responstable th:nth-child(2) span {
                display: block;
            }

            .responstable th:nth-child(2):after {
                display: none;
            }
        }

        .responstable td {
            /* display: block; */
            word-wrap: break-word;
            max-width: 7em;
        }

        .responstable td:first-child {
            display: table-cell;
            text-align: center;
            border-right: 1px solid #D9E4E6;
        }

        @media (min-width: 480px) {
            .responstable td {
                border: 1px solid #D9E4E6;
            }
        }

        .responstable th,
        .responstable td {
            text-align: left;
            margin: .5em 1em;
        }
    </style>

    <table class="responstable" style="border: 1px solid black !important">

        <tr>
            {{-- <th>Select</th> --}}
            {{-- <th data-th="Driver details"><span>First name</span></th> --}}
            <th style="width: 10%">No</th>
            <th style="width: 30%">Nama Barang</th>
            <th style="width: 10%">Stok Awal</th>
            <th style="width: 10%">Stok Terjual</th>
            <th style="width: 10%">Stok Tersisa</th>
            <th>Aksi</th>
        </tr>

        @foreach ($data as $key => $item)
            <tr>
                {{-- <td><input type="radio" /></td> --}}
                <td>{{ $key+1 }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{$item->stok_awal}}</td>
                <td>{{$item->stok_terjual}}</td>
                <td>{{$item->stok_akhir}}</td>
                <td class="">
                    <x-danger-button value="Delete" wire:click='delete({{$item->id}})' wire:confirm="Are you sure you want to delete this post?" class="mx-2" />
                    <x-button-primary value="Edit" wire:click='modalEdit({{$item->id}})' class="mx-2" />
                    
                </td>
            </tr>
        @endforeach



    </table>
    @if ($openEdit)
       <x-modaldash title="Edit Data" submit="edit" button="Update" close="closeEdit" />
    @endif
</div>
