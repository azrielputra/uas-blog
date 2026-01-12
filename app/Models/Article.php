<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // === TAMBAHKAN KODE INI ===
    protected $fillable = [
        'judul',
        'penulis',
        'isi',
        'tanggal_publikasi',
    ];
    // ==========================
}