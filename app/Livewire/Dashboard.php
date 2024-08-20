<?php

namespace App\Livewire;

use App\Models\DataBarang;
use Livewire\Component;

class Dashboard extends Component
{
    public $syrup;
    public $bubuk;
    public $terjual;
    public $sisa;
    public $Bterjual;
    public $Bsisa;
    public $galery = ['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg'];


    public function render()
    {
        $this->syrup = DataBarang::all();
        foreach($this->syrup as $jual){
            $this->terjual += $jual->stok_terjual;
        }
        foreach($this->syrup as $sis){
            $this->sisa += $sis->stok_akhir;
        }
        $this->bubuk = DataBarang::where('type', 'bubuk')->get();
        foreach($this->bubuk as $Bjual){
            $this->Bterjual += $Bjual->stok_terjual;
        }
        foreach($this->bubuk as $Bsis){
            $this->Bsisa += $Bsis->stok_akhir;
        }

        return view('livewire.dashboard');
    }
}
