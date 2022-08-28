<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 'nama_kegiatan', 'lokasi', 'keterangan', 'tanggal', 'kuota_peserta', 'gambar', 'id_kategori'
    ];
    protected $table = "kegiatan";
    protected $primaryKey = "id_kegiatan";

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'id_user', 'id_user');
    }

    public function komentar()
    {
        return $this->hasMany('\App\Models\komentar', 'id_kegiatan');
    }

    public function kategori()
    {
        return $this->belongsTo('\App\Models\Kategori', 'id_kategori', 'id_kategori');
    }
}
