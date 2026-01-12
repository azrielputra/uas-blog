<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar artikel (READ)
     */
    public function index()
    {
        // Ambil data terbaru
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Menampilkan formulir tambah artikel (CREATE - Form)
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Menyimpan artikel baru ke database (CREATE - Action)
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required|max:100',
            'isi' => 'required',
            'tanggal_publikasi' => 'required|date',
        ]);

        // Simpan data
        Article::create($request->all());

        // Redirect kembali ke index
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail artikel (Optional/Jarang dipakai di soal ini)
     */
    public function show(string $id)
    {
        // Kosongkan saja tidak apa-apa
    }

    /**
     * Menampilkan formulir edit artikel (UPDATE - Form)
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Memperbarui data artikel di database (UPDATE - Action)
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required|max:100',
            'isi' => 'required',
            'tanggal_publikasi' => 'required|date',
        ]);

        // Update data
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Menghapus artikel (DELETE)
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}