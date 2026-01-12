<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article; // <--- JANGAN LUPA BARIS INI!

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan kode ini ada di dalam fungsi run()
        Article::create([
            'judul' => 'Selamat Datang di Blog UAS',
            'isi' => 'Ini adalah contoh artikel pertama yang dibuat otomatis oleh seeder. Jika Anda membaca ini, berarti database berhasil terhubung!',
            'tanggal_publikasi' => now(),
            'penulis' => 'Admin Super',
        ]);
        
        Article::create([
            'judul' => 'Tips Belajar Laravel',
            'isi' => 'Laravel adalah framework yang menyenangkan. Jangan lupa minum kopi saat coding.',
            'tanggal_publikasi' => now(),
            'penulis' => 'Mahasiswa Rajin',
        ]);
    }
}