<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DataBarang;
use Livewire\Attributes\Url;
use Livewire\WithPagination;


error_reporting(0);

class ModalComponent extends Component
{

    use WithPagination;
    public $isOpen =  false;
    public $openEdit =  false;
    public $angkaRandom = '';
    public $nama = '';
    public $stokAwal = 0;
    public $stokTerjual = 0;
    public $stokSisa = 0;
    public $cari = '';


    public $idBarang;

    public function openModal()
    {
        // dd('tes');
        $this->isOpen = true;
        $this->angkaRandom = date('dm') . rand(1000, 9000);
    }
    public function modalEdit($id)
    {
        $this->openEdit = true;
        $br = DataBarang::find($id);
        $this->idBarang = $br->id;
        $this->angkaRandom = $br->kode;
        $this->nama = $br->nama_barang;
        $this->stokAwal = $br->stok_awal;
        $this->stokTerjual = $br->stok_terjual;
        $this->stokSisa = $br->stok_akhir;
    }
    public function closeEdit()
    {
        $this->res();
        $this->openEdit = false;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    // Method untuk menghitung stok sisa
    public function hitungStokSisa()
    {
        $this->stokSisa = (int)$this->stokAwal - (int)$this->stokTerjual;
    }

    public function save()
    {
        $dataBarang = new DataBarang();
        $dataBarang->kode = $this->angkaRandom;
        $dataBarang->nama_barang = $this->nama;
        $dataBarang->stok_awal = $this->stokAwal;
        $dataBarang->stok_terjual = $this->stokTerjual;
        $dataBarang->stok_akhir = $this->stokSisa;
        $dataBarang->jenis_syrup = null;
        $dataBarang->save();
        session()->flash('status', 'Tambah Data Sukses!');

        $this->closeModal();
        $this->res();
        // return $this->redirect('/dashboard');
    }

    public function delete($id)
    {
        // dd($id);
        $barang = DataBarang::find($id);
        if ($barang) {
            $barang->delete();
            session()->flash('status', 'Data ' . $barang->nama_barang . ' berhasil dihapus!');
        } else {
            session()->flash('status', 'Data tidak ditemukan!');
        }
    }

    public function edit()
    {
        $br = DataBarang::find($this->idBarang);
        $br->kode = $this->angkaRandom;
        $br->nama_barang =  $this->nama;
        $br->stok_awal = $this->stokAwal;
        $br->stok_terjual = $this->stokTerjual;
        $br->stok_akhir = $this->stokSisa;
        $br->save();
        session()->flash('status', 'Data berhasil diupdate!');
        $this->closeEdit();
    }



    public function res()
    {
        $this->angkaRandom = '';
        $this->nama = '';
        $this->stokAwal = '';
        $this->stokTerjual = '';
        $this->stokSisa = 0;
    }




    public function render()
    {

        $query = DataBarang::query();

        if ($this->cari) {
            $query->where('nama_barang', 'like', '%' . $this->cari . '%')
                  ->orWhere('kode', 'like', '%' . $this->cari . '%')
                  ->orWhere('stok_awal', 'like', '%' . $this->cari . '%')
                  ->orWhere('stok_terjual', 'like', '%' . $this->cari . '%')
                  ->orWhere('stok_akhir', 'like', '%' . $this->cari . '%');
        }

        $dataB = $query->paginate(10);
        return view('livewire.modal-component', ['data' => $dataB, 'cari' => $this->cari]);
    }
}
