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
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan_kategori' => 'nullable|string',
        ]);
    
        $kategori = Kategori::create($validatedData);
    
        // Redirect ke rute daftarKategori
        return redirect()->route('daftarKategori');
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
        // Validasi
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan_kategori' => 'nullable|string',
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
