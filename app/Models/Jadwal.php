<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nidn',
        'kode_matakuliah',
        'kelas',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];
    public function mataKuliah() {
        return $this->belongsTo(MataKuliah::class, 'kode_matakuliah', 'kode_matakuliah');
    }
    public function dosen() {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }
}
