<div>
    @include('components.style-tabel')
    <div class="flex justify-between">
        <div class="flex gap-2">
            <x-text-input type="number" wire:model="k" min="1" class="md:w-full lg:w-32" />
            <x-button-primary value="Proses Cluster" wire:click="clusterData" />
        </div>
        <x-button-primary value="Hasil Akhir" wire:click='akhir'/>
        {{-- <x-danger-button value="proses"  wire:click='pro'/> --}}
    </div>
    {{-- @if($proses === false)
        <div class="flex justify-center mt-5">
            <h3>Proses Cluster...</h3>
        </div>
    @endif --}}
    
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
