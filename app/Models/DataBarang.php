<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'stok_awal','stok_terjual', 'stok_akhir'.'jenis_syrup'];
}
