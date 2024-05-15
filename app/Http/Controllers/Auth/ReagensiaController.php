<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reagensia;

class ReagensiaController extends Controller
{
    public function showReagensiaForm(Request $request)
    {
        $query = Reagensia::query();

        if ($request->has('nama_reagen_kit')) {
            $query->where('nama_reagen_kit', 'like', '%' . $request->nama_reagen_kit . '%');
        }
        $reagensias = $query->get();
        return view('auth.inventarisreagensia', compact('reagensias'));
    }

    // Create
    public function create()
    {
        return view('auth.createReagensia');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_reagen_kit' => 'required',
            'tanggal_kadaluarsa'=>'required',
            'reagen_yang_telah_dipakai' => 'required',
            'ketersediaan' => 'required',
        ]);

        Reagensia::create($validatedData);
        return redirect()->route('reagensia')->with('success', 'Data berhasil ditambahkan.');
    }

    // Edit Reagen
    public function edit($id_reagen)
    {
        $reagensia = Reagensia::findOrFail($id_reagen);
        return view('auth.editReagensia', compact('reagensia'));
    }

    public function update(Request $request, $id_reagen)
    {
        $validatedData = $request->validate([
            'nama_reagen_kit' => 'required',
            'tanggal_kadaluarsa' => 'required',
            'reagen_yang_telah_dipakai' => 'required',
            'ketersediaan' => 'required',
        ]);

        $reagensia = Reagensia::findOrFail($id_reagen);
        $reagensia->update($validatedData);

        return redirect()->route('reagensia')->with('success', 'Data pasien berhasil diperbarui.');
    }

    // Delete Reagensia
    public function destroy($id_reagen)
    {
        // Hapus data pasien dari database
        $reagensia = Reagensia::findOrFail($id_reagen);
        $reagensia->delete();

        return redirect()->route('reagensia')->with('success', 'Data pasien berhasil dihapus.');
    }


    // Details Reagensia
    public function showReagenDetail($id_reagen)
    {
        $reagensia = Reagensia::findOrFail($id_reagen);
    
        return view('auth.detailReagensia', compact('reagensia'));
    }
}
