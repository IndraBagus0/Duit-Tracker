<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Kategori;

class CategoryController extends Controller
{
    // menampilkan data
    public function index()
    {
        $kategori = category::all();
        return view('category.index', [
            'kategori' => $kategori
        ]);
    }

    //menampilkan create

    public function create()
    {
        return view('category.create');
    }

    // tambah data
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate(
            [
                'categoryName' => 'required|string|min:5|max:255',
                'descriptionCategory' => 'nullable|string|min:10',
            ],
            [
                // Pesan kesalahan
                'categoryName.required' => 'Nama kategori wajib diisi.',
                'categoryName.string' => 'Nama kategori harus berupa teks.',
                'categoryName.min' => 'Nama kategori harus memiliki minimal 5 karakter.',
                'categoryName.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
                'descriptionCategory.string' => 'Keterangan kategori harus berupa teks.',
                'descriptionCategory.min' => 'Keterangan kategori minimal 10 karakter.',
            ]
        );

        // Jika validasi berhasil, buat kategori baru
        $kategori = category::create($validatedData);

        // Redirect ke rute daftarKategori dengan pesan sukses
        return redirect()->route('daftarKategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    // edit kategori
    public function edit(string $id)
    {
        $kategori = category::findOrFail($id);
        return view('category.edit', [
            'kategori' => $kategori
        ]);
    }

    // fungsi update kategori
    public function update(Request $request, $id_kategori)
    {
        // Validasi data input
        $validatedData = $request->validate(
            [
                'categoryName' => 'required|string|min:5|max:255',
                'descriptionCategory' => 'nullable|string|min:10',
            ],
            [
                // Pesan kesalahan
                'categoryName.required' => 'Nama kategori wajib diisi.',
                'categoryName.string' => 'Nama kategori harus berupa teks.',
                'categoryName.min' => 'Nama kategori harus memiliki minimal 5 karakter.',
                'categoryName.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
                'descriptionCategory.string' => 'Keterangan kategori harus berupa teks.',
                'descriptionCategory.min' => 'Keterangan kategori minimal 10 karakter.',
            ]
        );

        // Temukan kategori ID
        $kategori = category::findOrFail($id_kategori);

        // Perbarui data
        $kategori->update($validatedData);

        // Redirect
        return redirect()->route('daftarKategori')->with('success', 'Kategori berhasil diperbarui');
    }


    public function destroy($categoryId)
    {
        // Temukan ID
        $kategori = category::findOrFail($categoryId);

        // Hapus kategori
        $kategori->delete();

        // Redirect 
        return redirect()->route('daftarKategori')->with('success', 'Kategori berhasil dihapus');
    }
}
