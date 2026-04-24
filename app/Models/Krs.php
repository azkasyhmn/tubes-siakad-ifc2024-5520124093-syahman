<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = 'krs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_matakuliah',
        'npm',
    ];
    public function mataKuliah() {
        return $this->belongsTo(MataKuliah::class, 'kode_matakuliah', 'kode_matakuliah');
    }
    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'npm', 'npm');
    }
}
