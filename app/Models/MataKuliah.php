<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';
    protected $primaryKey = 'kode_matakuliah';
    protected $casts = [
        'kode_matakuliah' => 'string'
    ];
    protected $fillable = [
        'kode_matakuliah',
        'nama',
        'sks',
    ];
}
