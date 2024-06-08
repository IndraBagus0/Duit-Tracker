<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // menampilkan data
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', [
            'kategori' => $kategori
        ]);
    }

    //menampilkan create

    public function create()
    {
        return view('kategori.create');
    }

    // tambah data
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|min:5|max:255',
            'keterangan_kategori' => 'nullable|string|min:10',
        ],
        [
            // Pesan kesalahan
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.string' => 'Nama kategori harus berupa teks.',
            'nama_kategori.min' => 'Nama kategori harus memiliki minimal 5 karakter.',
            'nama_kategori.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
            'keterangan_kategori.string' => 'Keterangan kategori harus berupa teks.',
            'keterangan_kategori.min' => 'Keterangan kategori minimal 10 karakter.',
        ]);
    
        // Jika validasi berhasil, buat kategori baru
        $kategori = Kategori::create($validatedData);
    
        // Redirect ke rute daftarKategori dengan pesan sukses
        return redirect()->route('daftarKategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    // edit kategori
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id); 
        return view('kategori.edit', [
           'kategori' => $kategori
           ]);
    }

    // fungsi update kategori
    public function update(Request $request, $id_kategori)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|min:5|max:255',
            'keterangan_kategori' => 'nullable|string|min:10',
        ],
        [
            // Pesan kesalahan
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.string' => 'Nama kategori harus berupa teks.',
            'nama_kategori.min' => 'Nama kategori harus memiliki minimal 5 karakter.',
            'nama_kategori.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
            'keterangan_kategori.string' => 'Keterangan kategori harus berupa teks.',
            'keterangan_kategori.min' => 'Keterangan kategori minimal 10 karakter.',
        ]);
    
        // Temukan kategori ID
        $kategori = Kategori::findOrFail($id_kategori);
    
        // Perbarui data
        $kategori->update($validatedData);
    
        // Redirect
        return redirect()->route('daftarKategori')->with('success', 'Kategori berhasil diperbarui');
    }
    

  public function destroy($id_kategori)
{
    // Temukan ID
    $kategori = Kategori::findOrFail($id_kategori);

    // Hapus kategori
    $kategori->delete();

    // Redirect 
    return redirect()->route('daftarKategori')->with('success', 'Kategori berhasil dihapus');
}

}
