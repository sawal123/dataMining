<div>
    @include('components.style-tabel')
    <div class="flex justify-between">
        <div class="flex gap-2">
            @if ($select)
                <x-text-input text='Loop..' type='number' wire:model='loop' />
                <x-danger-button value="Proses Cluster" wire:click="clusterDataWithSelection" />
            @endif
            @if ($hasil)
                {{-- <x-button-primary value='Print' id="printButton" /> --}}
                <x-button-primary value='Download PDF' wire:click='downloadPdf'  />
            @endif
        </div>
        @if ($clus)
            <x-button-primary value="Hasil Akhir" wire:click='akhir' />
        @endif
    </div>
    <h2>{{ $warning }}</h2>

    @if ($hasil)
        <table id="resultTable" class="responstable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Cluster</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finalResults as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['nama_barang'] }}</td>
                        <td>{{ $item['cluster'] }}</td>
                        <td>{{ $item['keterangan'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @endif
    
    @if ($select)
        <table class="responstable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>kode</th>
                    <th>Nama Barang</th>
                    <th>Stok Awal</th>
                    <th>Stok Terjual</th>
                    <th>Stok Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataB as $index => $it)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $it['kode'] }}</td>
                        <td>
                            <input type="checkbox" value="{{ $it->kode }}" wire:model="selectedItems" />
                            {{ $it->nama_barang }}
                        </td>
                        <td>{{ $it['stok_awal'] }}</td>
                        <td>{{ $it['stok_terjual'] }}</td>
                        <td>{{ $it['stok_akhir'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif



    @if (!$hasil)
        @foreach ($iterations as $iterationIndex => $iteration)
            <h3>Iteration {{ $iterationIndex + 1 }}</h3>
            <table class="responstable">
                <thead>
                    <tr>
                        <th>Centroid</th>
                        <th>Stok Awal</th>
                        <th>Total Terjual</th>
                        <th>Stok Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($iteration['centroids'] as $centroidIndex => $centroid)
                        <tr>
                            <td>Centroid {{ $centroidIndex + 1 }}</td>
                            <td>{{ number_format($centroid['stok_awal'], 1) }}</td>
                            <td>{{ number_format($centroid['stok_terjual'], 1) }}</td>
                            <td>{{ number_format($centroid['stok_akhir'], 1) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="responstable">
                <thead>
                    <tr>
                        <th>Kode</th>
                        @for ($i = 1; $i <= $this->k; $i++)
                            <th>C{{ $i }}</th>
                        @endfor
                        <th>Jarak Terdekat</th>
                        <th>Cluster</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $itemIndex => $item)
                        <tr>
                            <td>{{ $item['kode'] }}</td>
                            @if (is_array($iteration['distances'][$itemIndex]))
                                @foreach ($iteration['distances'][$itemIndex] as $distance)
                                    <td>{{ number_format($distance, 1) }}</td>
                                @endforeach
                            @else
                                <td colspan="{{ $this->k }}">{{ $iteration['distances'][$itemIndex] }}</td>
                            @endif
                            <td>{{ number_format(min($iteration['distances'][$itemIndex]), 1) }}</td>
                            <td>
                                @foreach ($iteration['clusters'] as $clusterIndex => $cluster)
                                    @if (in_array($itemIndex, $cluster))
                                        {{ $clusterIndex + 1 }}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endif


   
</div>
