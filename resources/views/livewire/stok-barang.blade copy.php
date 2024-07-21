<div>
    @include('components.style-tabel')
    <div class="flex justify-between">
        <div class="flex gap-2">
            {{-- <x-text-input type="number" wire:model="k" min="1" class="md:w-full lg:w-32" />
            <x-button-primary value="Random Cluster" wire:click="clusterData" /> --}}
            <x-danger-button value="With Seleksi Cluster" wire:click="clusterDataWithSelection" />
        </div>
        <x-button-primary value="Hasil Akhir" wire:click='akhir'/>
        {{-- <x-danger-button value="proses"  wire:click='pro'/> --}}
    </div>

    <table class="responstable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok Awal</th>
                <th>Stok Terjual</th>
                <th>Stok Akhir</th>
                <th>Cluster</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $index => $it)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <input type="checkbox"  value="{{$it->id}}" wire:model="selectedItems" /> 
                    {{ $it->nama_barang }}
                </td>
                <td>{{ $it['stok_awal'] }}</td>
                <td>{{ $it['stok_terjual'] }}</td>
                <td>{{ $it['stok_akhir'] }}</td>
                <td>-</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    
        @if($proses)
        <!-- Menampilkan hasil cluster data -->
        <table class="responstable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Stok Awal</th>
                    <th>Stok Terjual</th>
                    <th>Stok Akhir</th>
                    <th>Cluster</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clusters as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $items[$item['index']]->nama_barang }}</td>
                    <td>{{ $item['stok_awal'] }}</td>
                    <td>{{ $item['stok_terjual'] }}</td>
                    <td>{{ $item['stok_tersisa'] }}</td>
                    <td>{{ $item['cluster'] + 1 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Menampilkan iterasi -->
        @foreach($iterations as $iterationIndex => $iteration)
            <h3>Iterasi {{ $iterationIndex + 1 }}</h3>
            <table class="responstable">
                <thead>
                    <tr>
                        <th>Nb</th>
                        @foreach($iteration['centroids'] as $centroidIndex => $centroid)
                            <th>C{{ $centroidIndex + 1 }}</th>
                        @endforeach
                        <th>Jarak Terdekat</th>
                        <th>Cluster</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($iteration['iterationData'] as $dataIndex => $data)
                    <tr>
                        <td>S{{ $dataIndex + 1 }}</td>
                        @foreach($data['distances'] as $distance)
                            <td>{{ number_format($distance, 2) }}</td>
                        @endforeach
                        <td>{{ number_format(min($data['distances']), 2) }}</td>
                        <td>{{ $data['closestCentroid'] + 1 }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @foreach($iteration['clusters'] as $clusterIndex => $cluster)
                <h4>Cluster {{ $clusterIndex + 1 }}</h4>
                <table class="responstable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Stok Awal</th>
                            <th>Stok Terjual</th>
                            <th>Stok Tersisa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cluster as $itemIndex => $item)
                        <tr>
                            <td>{{ $itemIndex + 1 }}</td>
                            <td>{{ $item['stok_awal'] }}</td>
                            <td>{{ $item['stok_terjual'] }}</td>
                            <td>{{ $item['stok_tersisa'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @endforeach
    @endif

    @if($hasil && !empty($clusters))
        <!-- Menampilkan kesimpulan -->
        <h3 class="mt-5">Kesimpulan Hasil Cluster</h3>
        <table class="responstable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Cluster</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clusters as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $items[$item['index']]->nama_barang }}</td>
                    <td>C{{ $item['cluster'] + 1 }}</td>
                    <td>
                        @if($item['cluster'] == 0)
                            Sangat Laris
                        @elseif($item['cluster'] == 1)
                            Cukup Laris
                        @else
                            Tidak Laris
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
