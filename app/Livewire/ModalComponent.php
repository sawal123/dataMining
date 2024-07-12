<?php

namespace App\Livewire;

use App\Models\DataBarang;
use Livewire\Component;
error_reporting(0);

class ModalComponent extends Component
{

    public $isOpen =  false;
    public $openEdit =  false;
    public $angkaRandom = '';
    public $nama = '';
    public $stokAwal=0;
    public $stokTerjual=0;
    public $stokSisa = 0;


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
    public function closeEdit(){
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



    public $data;
    public function data(){
        $this->data = DataBarang::all();
    }

    public function delete($id){
        // dd($id);
        $barang = DataBarang::find($id);
        if($barang){
            $barang->delete();
            session()->flash('status', 'Data '.$barang->nama_barang.' berhasil dihapus!');
        }else{
            session()->flash('status', 'Data tidak ditemukan!');
        }
    }

    public function edit(){
        
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
        $this->stokAwal='';
        $this->stokTerjual='';
        $this->stokSisa = 0;
    }
    public function render()
    {
        $this->data();
        return view('livewire.modal-component');
    }
}
