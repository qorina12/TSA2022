<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;

class Pendidikan extends Model
{
    use HasFactory;
    // Mendefinisikan bahwa model ini terkait dengan tabel pendidikan
    protected $table='pendidikan';

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
