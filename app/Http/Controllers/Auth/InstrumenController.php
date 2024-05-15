<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instrumen;

class InstrumenController extends Controller
{
    // Menampilkan form untuk pencarian dan daftar instrumen
    public function showInstrumenForm(Request $request)
    {
        $query = Instrumen::query();

        // Filter berdasarkan nama reagen kit jika ada
        if ($request->has('nama_reagen_kit')) {
            $query->where('nama_reagen_kit', 'like', '%' . $request->nama_reagen_kit . '%');
        }

        // Mengambil semua data instrumen yang sesuai dengan filter
        $instrumen = $query->get();
        return view('auth.minstrumen', compact('instrumen'));
    }

    // Menampilkan form untuk membuat instrumen baru
    public function create()
    {
        return view('auth.createInstrumen');
    }

    // Menyimpan instrumen baru ke database
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'instrumen' => 'required',
            'jumlah_instrumen' => 'required',
            'tanggal_t_maintenance' => 'required',
            'deskripsi' => 'required',
            'tanggal_b_maintenance' => 'required',
        ]);

        // Membuat instrumen baru dengan data yang sudah divalidasi
        Instrumen::create($validatedData);
        return redirect()->route('instrumen')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit instrumen yang sudah ada
    public function edit($id_instrumen)
    {
        // Mengambil data instrumen berdasarkan ID
        $instrumen = Instrumen::findOrFail($id_instrumen);
        return view('auth.editInstrumen', compact('instrumen'));
    }

    // Memperbarui instrumen yang sudah ada di database
    public function update(Request $request, $id_instrumen)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'instrumen' => 'required',
            'jumlah_instrumen' => 'required',
            'tanggal_t_maintenance' => 'required',
            'deskripsi' => 'required',
            'tanggal_b_maintenance' => 'required',
        ]);

        // Mengambil data instrumen berdasarkan ID
        $instrumen = Instrumen::findOrFail($id_instrumen);
        // Memperbarui data instrumen dengan data yang sudah divalidasi
        $instrumen->update($validatedData);

        return redirect()->route('instrumen')->with('success', 'Data instrumen berhasil diperbarui.');
    }

    // Menghapus instrumen dari database
    public function destroy($id_instrumen)
    {
        // Mengambil data instrumen berdasarkan ID
        $instrumen = Instrumen::findOrFail($id_instrumen);
        // Menghapus data instrumen
        $instrumen->delete();

        return redirect()->route('instrumen')->with('success', 'Data instrumen berhasil dihapus.');
    }

    // Menampilkan detail instrumen
    public function showInstrumenDetail($id_instrumen)
    {
        // Mengambil data instrumen berdasarkan ID
        $instrumen = Instrumen::findOrFail($id_instrumen);

        return view('auth.detailInstrumen', compact('instrumen'));
    }
}
