<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $primaryKey = "id_komentar";
    protected $table = "komentar";
    protected $fillable = ['id_kegiatan', 'id_user', 'komentar'];

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'id_user');
    }

    public function kegiatan()
    {
        return $this->belongsTo('\App\Models\Kegiatan', 'id_kegiatan');
    }
}
