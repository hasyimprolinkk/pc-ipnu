<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $primaryKey = "id_kategori";
    protected $table = "kategori";
    protected $fillable = ['kategori'];

    public function kegiatan()
    {
        return $this->hasMany('\App\Models\Kegiatan', 'id_kegiatan');
    }
}
