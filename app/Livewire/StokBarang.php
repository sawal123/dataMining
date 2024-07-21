<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DataBarang;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
error_reporting(0);

class StokBarang extends Component
{
    public $items = [];
    public $selectedItems = [];
    public $centroids = [];
    public $iterations = [];
    public $k = 3; // Number of clusters
    public  $finalClusters;

    public function mount()
    {
        // Load your initial items from the database or other source
        $this->items = DataBarang::all()->toArray();
    }

    public function clusterDataWithSelection()
    {
        $this->centroids = [];
        foreach ($this->selectedItems as $kode) {
            $this->centroids[] = DataBarang::where('kode', $kode)->first()->toArray();
        }
        usort($this->centroids, function ($a, $b) {
            return $b['stok_terjual'] <=> $a['stok_terjual'];
        });
        $this->k = count($this->centroids);
        $this->iterations = []; // Reset iterations
        $this->performClustering();
    }

    public function performClustering()
    {
        $iteration = 0;
        do {
            $iteration++;
            $newCentroids = [];
            $clusters = [];
            $distances = []; // Initialize distances array

            // Initialize clusters
            for ($i = 0; $i < $this->k; $i++) {
                $clusters[$i] = [];
            }

            // Assign items to the nearest centroid
            foreach ($this->items as $index => $item) {
                $itemDistances = [];
                foreach ($this->centroids as $centroid) {
                    $itemDistances[] = $this->calculateDistance($item, $centroid);
                }
                $distances[$index] = $itemDistances; // Store distances for each item
                $minDistance = min($itemDistances);
                $clusterIndex = array_search($minDistance, $itemDistances);
                $clusters[$clusterIndex][] = $index;
            }

            // Recalculate centroids
            foreach ($clusters as $index => $cluster) {
                if (count($cluster) > 0) {
                    $centroid = $this->recalculateCentroid($cluster);
                    $centroid['kode'] = $this->items[$cluster[0]]['kode']; // Assign kode
                    $newCentroids[$index] = $centroid;
                } else {
                    $newCentroids[$index] = $this->centroids[$index];
                }
            }

            // Sort centroids by total terjual (descending)
            usort($newCentroids, function ($a, $b) {
                return $b['stok_terjual'] - $a['stok_terjual'];
            });

            // Store iteration results
            $this->iterations[] = [
                'centroids' => $this->centroids,
                'clusters' => $clusters,
                'distances' => $distances, // Store distances for iteration
            ];

            // Update centroids
            $this->centroids = $newCentroids;
        } while ($iteration < 10); // Limit the number of iterations
        $this->finalClusters = $clusters;
        $this->getFinalResults();
    }
    
    public function getFinalResults()
    {
        $results = [];
        foreach ($this->finalClusters as $clusterIndex => $cluster) {
            foreach ($cluster as $itemIndex) {
                $item = $this->items[$itemIndex];
                $results[] = [
                    'nama_barang' => $item['nama_barang'],
                    'cluster' => 'C' . ($clusterIndex + 1),
                    'keterangan' => $this->getClusterKeterangan($clusterIndex + 1),
                ];
            }
        }
        // dd($results);
        return $results;
    }

    public function getClusterKeterangan($clusterIndex)
    {
        switch ($clusterIndex) {
            case 1:
                return 'Sangat Laris';
            case 2:
                return 'Cukup Laris';
            case 3:
                return 'Tidak Laris';
            default:
                return 'Tidak Diketahui';
        }
    }

    public function calculateDistance($item, $centroid)
    {
        return sqrt(
            pow($item['stok_awal'] - $centroid['stok_awal'], 2) +
                pow($item['stok_terjual'] - $centroid['stok_terjual'], 2) +
                pow($item['stok_akhir'] - $centroid['stok_akhir'], 2)
        );
    }


    public function recalculateCentroid($cluster)
    {
        $stokAwal = $stokTerjual = $stokAkhir = 0;
        foreach ($cluster as $index) {
            $stokAwal += $this->items[$index]['stok_awal'];
            $stokTerjual += $this->items[$index]['stok_terjual'];
            $stokAkhir += $this->items[$index]['stok_akhir'];
        }
        $count = count($cluster);
        return [
            'stok_awal' => $stokAwal / $count,
            'stok_terjual' => $stokTerjual / $count,
            'stok_akhir' => $stokAkhir / $count,
        ];
    }

    

    public function render()
    {
        
        $finalResults = $this->getFinalResults();
        $dataB = DataBarang::all();
        return view('livewire.stok-barang', [
            'dataB' => $dataB,
            'finalResults' => $finalResults,
        ]);
    }
}
