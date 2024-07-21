<?php

namespace Database\Seeders;

use App\Models\DataBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataBarang::insert(
            [
                [
                    "kode" => "01",
                    "nama_barang" => "Premium matcha",
                    "stok_awal" => "140",
                    "stok_terjual" => "110",
                    "stok_akhir" => "30",
                    "cluster" => NULL
                ],
                [
                    "kode" => "02",
                    "nama_barang" => "Premium Chocolate",
                    "stok_awal" => "122",
                    "stok_terjual" => "46",
                    "stok_akhir" => "76",
                    "cluster" => NULL
                ],
                [
                    "kode" => "03",
                    "nama_barang" => "Red Velvet",
                    "stok_awal" => "80",
                    "stok_terjual" => "20",
                    "stok_akhir" => "60",
                    "cluster" => NULL
                ],
                [
                    "kode" => "04",
                    "nama_barang" => "Banana Syrup",
                    "stok_awal" => "50",
                    "stok_terjual" => "45",
                    "stok_akhir" => "5",
                    "cluster" => NULL
                ],
                [
                    "kode" => "05",
                    "nama_barang" => "Butterscotch Syrup",
                    "stok_awal" => "180",
                    "stok_terjual" => "120",
                    "stok_akhir" => "60",
                    "cluster" => NULL
                ],
                [
                    "kode" => "06",
                    "nama_barang" => "Calamansi Syrup",
                    "stok_awal" => "230",
                    "stok_terjual" => "195",
                    "stok_akhir" => "35",
                    "cluster" => NULL
                ],
                [
                    "kode" => "07",
                    "nama_barang" => "Caramel Syrup",
                    "stok_awal" => "200",
                    "stok_terjual" => "140",
                    "stok_akhir" => "60",
                    "cluster" => NULL
                ],
                [
                    "kode" => "08",
                    "nama_barang" => "Cinnamon Syrup",
                    "stok_awal" => "320",
                    "stok_terjual" => "298",
                    "stok_akhir" => "22",
                    "cluster" => NULL
                ],
                [
                    "kode" => "09",
                    "nama_barang" => "Coconut Syrup",
                    "stok_awal" => "215",
                    "stok_terjual" => "200",
                    "stok_akhir" => "15",
                    "cluster" => NULL
                ],
                [
                    "kode" => "10",
                    "nama_barang" => "Coconut Sugar Syrup",
                    "stok_awal" => "120",
                    "stok_terjual" => "70",
                    "stok_akhir" => "50",
                    "cluster" => NULL
                ],
                [
                    "kode" => "11",
                    "nama_barang" => "Cream Cheese Syrup",
                    "stok_awal" => "150",
                    "stok_terjual" => "80",
                    "stok_akhir" => "70",
                    "cluster" => NULL
                ],
                [
                    "kode" => "12",
                    "nama_barang" => "Elderflower Syrup",
                    "stok_awal" => "120",
                    "stok_terjual" => "90",
                    "stok_akhir" => "30",
                    "cluster" => NULL
                ],
                [
                    "kode" => "13",
                    "nama_barang" => "Frambozen Syrup",
                    "stok_awal" => "150",
                    "stok_terjual" => "100",
                    "stok_akhir" => "50",
                    "cluster" => NULL
                ],
                [
                    "kode" => "14",
                    "nama_barang" => "Hazelnut Syrup",
                    "stok_awal" => "230",
                    "stok_terjual" => "160",
                    "stok_akhir" => "70",
                    "cluster" => NULL
                ],
                [
                    "kode" => "15",
                    "nama_barang" => "Honey Syrup",
                    "stok_awal" => "200",
                    "stok_terjual" => "165",
                    "stok_akhir" => "35",
                    "cluster" => NULL
                ],
                [
                    "kode" => "16",
                    "nama_barang" => "Jasmine Syrup",
                    "stok_awal" => "250",
                    "stok_terjual" => "150",
                    "stok_akhir" => "100",
                    "cluster" => NULL
                ],
                [
                    "kode" => "17",
                    "nama_barang" => "Lemonade Syrup",
                    "stok_awal" => "150",
                    "stok_terjual" => "110",
                    "stok_akhir" => "40",
                    "cluster" => NULL
                ],
                [
                    "kode" => "18",
                    "nama_barang" => "Lychee Syrup",
                    "stok_awal" => "80",
                    "stok_terjual" => "25",
                    "stok_akhir" => "55",
                    "cluster" => NULL
                ],
                [
                    "kode" => "19",
                    "nama_barang" => "Mint Syrup",
                    "stok_awal" => "300",
                    "stok_terjual" => "270",
                    "stok_akhir" => "30",
                    "cluster" => NULL
                ],
                [
                    "kode" => "20",
                    "nama_barang" => "Orange Syrup",
                    "stok_awal" => "50",
                    "stok_terjual" => "13",
                    "stok_akhir" => "37",
                    "cluster" => NULL
                ],
                [
                    "kode" => "21",
                    "nama_barang" => "Osmanthus Syrup",
                    "stok_awal" => "70",
                    "stok_terjual" => "45",
                    "stok_akhir" => "25",
                    "cluster" => NULL
                ],
                [
                    "kode" => "22",
                    "nama_barang" => "Palm Sugar Syrup",
                    "stok_awal" => "120",
                    "stok_terjual" => "88",
                    "stok_akhir" => "32",
                    "cluster" => NULL
                ],
                [
                    "kode" => "23",
                    "nama_barang" => "Pandan Syrup",
                    "stok_awal" => "380",
                    "stok_terjual" => "360",
                    "stok_akhir" => "20",
                    "cluster" => NULL
                ],
                [
                    "kode" => "24",
                    "nama_barang" => "Passionfruit Syrup",
                    "stok_awal" => "180",
                    "stok_terjual" => "155",
                    "stok_akhir" => "25",
                    "cluster" => NULL
                ],
                [
                    "kode" => "25",
                    "nama_barang" => "Peach Syrup",
                    "stok_awal" => "200",
                    "stok_terjual" => "176",
                    "stok_akhir" => "24",
                    "cluster" => NULL
                ],
                [
                    "kode" => "26",
                    "nama_barang" => "Pear Syrup",
                    "stok_awal" => "110",
                    "stok_terjual" => "50",
                    "stok_akhir" => "60",
                    "cluster" => NULL
                ],
                [
                    "kode" => "27",
                    "nama_barang" => "Pistachio Syrup",
                    "stok_awal" => "300",
                    "stok_terjual" => "220",
                    "stok_akhir" => "80",
                    "cluster" => NULL
                ],
                [
                    "kode" => "28",
                    "nama_barang" => "Rose Syrup",
                    "stok_awal" => "150",
                    "stok_terjual" => "90",
                    "stok_akhir" => "60",
                    "cluster" => NULL
                ],
                [
                    "kode" => "29",
                    "nama_barang" => "Rumbullion Syrup",
                    "stok_awal" => "120",
                    "stok_terjual" => "100",
                    "stok_akhir" => "20",
                    "cluster" => NULL
                ],
                [
                    "kode" => "30",
                    "nama_barang" => "Sakura Syrup",
                    "stok_awal" => "200",
                    "stok_terjual" => "155",
                    "stok_akhir" => "45",
                    "cluster" => NULL
                ],
                [
                    "kode" => "31",
                    "nama_barang" => "Sour Plum Syrup",
                    "stok_awal" => "150",
                    "stok_terjual" => "85",
                    "stok_akhir" => "65",
                    "cluster" => NULL
                ],
                [
                    "kode" => "32",
                    "nama_barang" => "Strawberry Syrup",
                    "stok_awal" => "150",
                    "stok_terjual" => "50",
                    "stok_akhir" => "100",
                    "cluster" => NULL
                ],
                [
                    "kode" => "33",
                    "nama_barang" => "Tiramisu Syrup",
                    "stok_awal" => "270",
                    "stok_terjual" => "220",
                    "stok_akhir" => "50",
                    "cluster" => NULL
                ],
                [
                    "kode" => "34",
                    "nama_barang" => "Vanilla Syrup",
                    "stok_awal" => "300",
                    "stok_terjual" => "290",
                    "stok_akhir" => "10",
                    "cluster" => NULL
                ],
                [
                    "kode" => "35",
                    "nama_barang" => "White Passionfruit",
                    "stok_awal" => "230",
                    "stok_terjual" => "180",
                    "stok_akhir" => "50",
                    "cluster" => NULL
                ],
                [
                    "kode" => "36",
                    "nama_barang" => "Strawberry pulp",
                    "stok_awal" => "210",
                    "stok_terjual" => "175",
                    "stok_akhir" => "35",
                    "cluster" => NULL
                ],
                [
                    "kode" => "37",
                    "nama_barang" => "Harum Manis Pulp",
                    "stok_awal" => "100",
                    "stok_terjual" => "60",
                    "stok_akhir" => "40",
                    "cluster" => NULL
                ],
                [
                    "kode" => "38",
                    "nama_barang" => "Kiwi Pulp",
                    "stok_awal" => "170",
                    "stok_terjual" => "110",
                    "stok_akhir" => "60",
                    "cluster" => NULL
                ],
                [
                    "kode" => "39",
                    "nama_barang" => "Mixed Berry Pulp",
                    "stok_awal" => "230",
                    "stok_terjual" => "150",
                    "stok_akhir" => "80",
                    "cluster" => NULL
                ],
                [
                    "kode" => "40",
                    "nama_barang" => "Yuzu Pulp",
                    "stok_awal" => "170",
                    "stok_terjual" => "125",
                    "stok_akhir" => "45",
                    "cluster" => NULL
                ],
                [
                    "kode" => "41",
                    "nama_barang" => "Multibev Doger Syrup",
                    "stok_awal" => "100",
                    "stok_terjual" => "20",
                    "stok_akhir" => "80",
                    "cluster" => NULL
                ],
                [
                    "kode" => "42",
                    "nama_barang" => "Multibev Grape Syrup",
                    "stok_awal" => "140",
                    "stok_terjual" => "110",
                    "stok_akhir" => "30",
                    "cluster" => NULL
                ],
                [
                    "kode" => "43",
                    "nama_barang" => "Multibev lychee Syrup",
                    "stok_awal" => "210",
                    "stok_terjual" => "200",
                    "stok_akhir" => "10",
                    "cluster" => NULL
                ],
                [
                    "kode" => "44",
                    "nama_barang" => "Multibev Bubblegum Syrup",
                    "stok_awal" => "180",
                    "stok_terjual" => "110",
                    "stok_akhir" => "70",
                    "cluster" => NULL
                ],
                [
                    "kode" => "45",
                    "nama_barang" => "Multibev Mint Syrup",
                    "stok_awal" => "190",
                    "stok_terjual" => "185",
                    "stok_akhir" => "5",
                    "cluster" => NULL
                ]
            ]
        );
        
    }
    }
