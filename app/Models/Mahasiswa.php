<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'npm';
    protected $fillable = [
        'nidn',
        'npm',
        'nama',
    ];
    public function dosen() {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }
}
