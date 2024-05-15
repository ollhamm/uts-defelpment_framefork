<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Pemeriksaan;
use Illuminate\Support\Str;

class ManajemenPasienController extends Controller
{

    public function getTotalPatientsCount()
{
    try {
        $totalPatients = Patient::count();
        return $totalPatients;
    } catch (\Exception $e) {
        return 0;
    }
}


    // Home
    public function showHomeForm(Request $request)
    {
        $query = Patient::query();

        $patients = $query->get();
        $totalPatientsCount = $this->getTotalPatientsCount();

        return view('auth.home', compact('patients', 'totalPatientsCount'));
    }



    // manajement pasien view
    public function showManajementForm(Request $request)
    {
        $query = Patient::query();

        if ($request->has('nama')) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }
        if ($request->has('rujukan')) {
            $query->where('rujukan', 'like', '%' . $request->rujukan . '%');
        }
        if ($request->has('tanggal_lahir')) {
            $query->where('tanggal_lahir', 'like', '%' . $request->tanggal_lahir . '%');
        }

        $patients = $query->get();
        return view('auth.mpasient', compact('patients'));
    }

    // genereate kode P00
    private function generateRMCode()
    {
        $latestRM = Patient::latest()->value('rm');
        if ($latestRM) {
            $code = Str::of($latestRM)->replace('P', '');
            $nextNumber = (int) $code->__toString() + 1;
            return 'P' . sprintf('%03d', $nextNumber);
        } else {
            return 'P001';
        }
    }

    // create pasien
    public function create()
    {
        $defaultRM = $this->generateRMCode();
        return view('auth.create', compact('defaultRM'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'rm' => 'required',
            'rujukan' => 'required',
            'jenis_asuransi' => 'required',
            'nomor_asuransi' => 'required',
            'status' => 'required',
        ]);

        Patient::create($validatedData);
        return redirect()->route('mpasient')->with('success', 'Pasien berhasil ditambahkan.');
    }


    // edit pasien
    public function edit($id_pasien)
    {
        $patient = Patient::findOrFail($id_pasien);
        return view('auth.edit', compact('patient'));
    }

    public function update(Request $request, $id_pasien)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'rm' => 'required',
            'rujukan' => 'required',
            'jenis_asuransi' => 'required',
            'nomor_asuransi' => 'required',
            'status' => 'required',
        ]);

        $patient = Patient::findOrFail($id_pasien);
        $patient->update($validatedData);

        return redirect()->route('mpasient')->with('success', 'Data pasien berhasil diperbarui.');
    }


    // delete pasien
    public function destroy($id_pasien)
    {
        // Hapus data pasien dari database
        $patient = Patient::findOrFail($id_pasien);
        $patient->delete();

        return redirect()->route('mpasient')->with('success', 'Data pasien berhasil dihapus.');
    }



    // show datadiri dan pemeriksaan
    public function showPatientDetailsAndPemeriksaan($id_pasien)
    {
        $patient = Patient::findOrFail($id_pasien);
        $pemeriksaan = Pemeriksaan::where('id_pasien', $id_pasien)->first();
    
        if (!$pemeriksaan) {
            $pemeriksaan = "Pasien belum melakukan pemeriksaan";
        }
    
        return view('auth.datadiri', compact('patient', 'pemeriksaan'));
    }

}




