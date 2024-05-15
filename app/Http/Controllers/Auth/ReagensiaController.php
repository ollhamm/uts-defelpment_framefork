<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reagensia;

class ReagensiaController extends Controller
{
    // Menampilkan form pencarian dan daftar reagensia
    public function showReagensiaForm(Request $request)
    {
        $query = Reagensia::query();

        // Filter berdasarkan nama reagen kit jika ada
        if ($request->has('nama_reagen_kit')) {
            $query->where('nama_reagen_kit', 'like', '%' . $request->nama_reagen_kit . '%');
        }

        // Mengambil semua data reagensia yang sesuai dengan filter
        $reagensias = $query->get();
        return view('auth.inventarisreagensia', compact('reagensias'));
    }

    // Menampilkan form untuk membuat reagensia baru
    public function create()
    {
        return view('auth.createReagensia');
    }

    // Menyimpan reagensia baru ke database
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_reagen_kit' => 'required',
            'tanggal_kadaluarsa' => 'required',
            'reagen_yang_telah_dipakai' => 'required',
            'ketersediaan' => 'required',
        ]);

        // Membuat reagensia baru dengan data yang sudah divalidasi
        Reagensia::create($validatedData);
        return redirect()->route('reagensia')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit reagensia yang sudah ada
    public function edit($id_reagen)
    {
        // Mengambil data reagensia berdasarkan ID
        $reagensia = Reagensia::findOrFail($id_reagen);
        return view('auth.editReagensia', compact('reagensia'));
    }

    // Memperbarui reagensia yang sudah ada di database
    public function update(Request $request, $id_reagen)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_reagen_kit' => 'required',
            'tanggal_kadaluarsa' => 'required',
            'reagen_yang_telah_dipakai' => 'required',
            'ketersediaan' => 'required',
        ]);

        // Mengambil data reagensia berdasarkan ID
        $reagensia = Reagensia::findOrFail($id_reagen);
        // Memperbarui data reagensia dengan data yang sudah divalidasi
        $reagensia->update($validatedData);

        return redirect()->route('reagensia')->with('success', 'Data reagensia berhasil diperbarui.');
    }

    // Menghapus reagensia dari database
    public function destroy($id_reagen)
    {
        // Mengambil data reagensia berdasarkan ID
        $reagensia = Reagensia::findOrFail($id_reagen);
        // Menghapus data reagensia
        $reagensia->delete();

        return redirect()->route('reagensia')->with('success', 'Data reagensia berhasil dihapus.');
    }

    // Menampilkan detail reagensia
    public function showReagenDetail($id_reagen)
    {
        // Mengambil data reagensia berdasarkan ID
        $reagensia = Reagensia::findOrFail($id_reagen);

        return view('auth.detailReagensia', compact('reagensia'));
    }
}
