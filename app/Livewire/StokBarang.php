<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DataBarang;

\error_reporting(0);

class StokBarang extends Component
{
    public $items;
    public $clusters = [];
    public $iterations = []; // Menyimpan data setiap iterasi
    public $k = 3; // Nilai K bisa diubah sesuai kebutuhan

    public $hasil = false;
    public $proses = false;

    public function akhir()
    {
        $this->hasil = true;
        $this->proses = false;
    }
    public function pro()
    {
        $this->hasil = false;
        $this->proses = true;
    }

    public function mount()
    {
        $this->items = DataBarang::all();
    }
    public function resetClusterData()
    {
        $this->clusters = [];
        $this->iterations = [];
    }

    public function clusterData()
    {
        $this->resetClusterData();
        $data = $this->items->map(function ($item, $index) {
            return [
                'index' => $index,
                'stok_awal' => $item->stok_awal ?? 0,
                'stok_terjual' => $item->stok_terjual ?? 0,
                'stok_tersisa' => $item->stok_akhir ?? 0,
            ];
        })->toArray();

        $this->clusters = $this->kmeans($data, $this->k);
        $this->pro();
    }

    public function kmeans($data, $k)
    {
        // Inisialisasi centroid secara acak
        $centroids = [];
        $randomKeys = array_rand($data, $k);
        foreach ($randomKeys as $key) {
            $centroids[] = $data[$key];
        }

        $clusters = array_fill(0, $k, []);
        $prevCentroids = [];
        $iterations = 0;

        do {
            $prevCentroids = $centroids;

            // Kosongkan cluster
            foreach ($clusters as &$cluster) {
                $cluster = [];
            }

            $iterationData = [];
            // Assign setiap data ke cluster terdekat
            foreach ($data as $point) {
                $distances = array_map(function ($centroid) use ($point) {
                    return sqrt(
                        pow($centroid['stok_awal'] - $point['stok_awal'], 2) +
                            pow($centroid['stok_terjual'] - $point['stok_terjual'], 2) +
                            pow($centroid['stok_tersisa'] - $point['stok_tersisa'], 2)
                    );
                }, $centroids);

                $closestCentroid = array_keys($distances, min($distances))[0];
                $clusters[$closestCentroid][] = $point;

                $iterationData[] = [
                    'point' => $point,
                    'distances' => $distances,
                    'closestCentroid' => $closestCentroid,
                ];
            }

            // Simpan data iterasi
            $this->iterations[] = [
                'centroids' => $centroids,
                'iterationData' => $iterationData,
                'clusters' => $clusters, // Simpan clusters di setiap iterasi
            ];

            // Update centroid
            foreach ($clusters as $i => $cluster) {
                if (count($cluster) > 0) {
                    $centroids[$i] = array_reduce($cluster, function ($carry, $point) {
                        $carry['stok_awal'] += $point['stok_awal'];
                        $carry['stok_terjual'] += $point['stok_terjual'];
                        $carry['stok_tersisa'] += $point['stok_tersisa'];
                        return $carry;
                    }, ['stok_awal' => 0, 'stok_terjual' => 0, 'stok_tersisa' => 0]);

                    $count = count($cluster);
                    $centroids[$i]['stok_awal'] /= $count;
                    $centroids[$i]['stok_terjual'] /= $count;
                    $centroids[$i]['stok_tersisa'] /= $count;
                }
            }

            $iterations++;
        } while ($centroids !== $prevCentroids && $iterations < 100);

        // Tambahkan label cluster ke setiap data
        $result = [];
        foreach ($clusters as $i => $cluster) {
            foreach ($cluster as $point) {
                $point['cluster'] = $i;
                $result[] = $point;
            }
        }

        return $result;
    }

    public function render()
    {
        return view('livewire.stok-barang', [
            'items' => $this->items,
            'clusters' => $this->clusters,
            'iterations' => $this->iterations
        ]);
    }
}
