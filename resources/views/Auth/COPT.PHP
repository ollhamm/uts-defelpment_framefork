@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header text-start shadow"
                     style="font-weight: bold; background-color: #7fbf7f; color: white;">
                    Detail Pemeriksaan <br />
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-header text-center"
                                 style="font-weight: bold; background-color: #7fbf7f; color: white;">
                                Identitas Pasien <br />
                                {{ $patient->rm }}
                            </div>
                            <div id="barcode" class="card-body shadow" data-rm="{{ $patient->rm }}">
                                <pre>
Nama                    : <strong>{{ $patient->nama }}</strong>
Umur                    : <strong>{{ $patient->umur }} tahun</strong>
Jenis Kelamin           : <strong>{{ $patient->jenis_kelamin }}</strong>
Tempat Tanggal Lahir    : <strong>{{ $patient->tanggal_lahir }}</strong>
Alamat                  : <strong>{{ $patient->alamat }}</strong>
Jenis Asuransi          : <strong>{{ $patient->jenis_asuransi }}</strong>
Nomor Asuransi          : <strong>{{ $patient->nomor_asuransi }}</strong>
RM (Rekam Medis)        : <strong>{{ $patient->rm }}</strong>
Rujukan                 : <strong>{{ $patient->rujukan }}</strong>
Status                  : <strong style="color: {{ $patient->status == 'Aktif' ? 'green' : 'red' }}">{{ $patient->status }}</strong>
                                </pre>
                                <style>
                                    @media print {
                                        .btn-print {
                                            display: none;
                                        }

                                        .card {
                                            border: none;
                                            box-shadow: none;
                                        }
                                    }
                                </style>
                                <div class="text-right mt-3">
                                    <a id="btn-print-barcode" class="btn btn-secondary">
                                        <i class="fa-solid fa-print"></i> Barcode
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Card untuk Detail Pemeriksaan -->
                            <div class="container mb-5">
                                <div class="card-header text-center"
                                     style="font-weight: bold; background-color: #7fbf7f; color: white;">
                                    Amnesis Dokter <br />
                                </div>
                                <div class="card-body shadow border-0">
                                    @if ($pemeriksaan && is_object($pemeriksaan))
                                        <pre>
<strong>{{ $pemeriksaan->rincian_pemeriksaan }}</strong>
                                        </pre>
                                    @else
                                        <p>Pasien belum melakukan pemeriksaan!</p>
                                    @endif
                                </div>
                            </div>

                            <div class="container">
                                <div class="card-header text-center"
                                     style="font-weight: bold; background-color: #7fbf7f; color: white;">
                                    Tindakan Pelayanan Laboratorium: <br />
                                </div>
                                <div class="card-body shadow border-0">
                                    @if ($pemeriksaan && is_object($pemeriksaan))
                                        <pre>
Nama Pasien      : <strong>{{ $pemeriksaan->patients->nama }}</strong>
Tanggal          : <strong>{{ $pemeriksaan->tanggal_pemeriksaan }}</strong>
Unit             : <strong>{{ $pemeriksaan->unit_pemeriksaan }}</strong>
Rujukan Dari     : <strong>{{ $pemeriksaan->rujukan_pemeriksaan }}</strong>
Rincian Tindakan : <strong>{{ $pemeriksaan->rincian_pemeriksaan }}</strong>
Jenis Pembayaran : <strong>{{ $pemeriksaan->jenis_pembayaran }}</strong>
                                        </pre>
                                    @else
                                        <p>Pasien belum melakukan pemeriksaan!</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3 ml-3"> <!-- Mengatur posisi tombol print detail -->
                        <div class="col-md-auto ml-auto"> <!-- Mengubah kolom menjadi setengah lebar dan mengatur posisi -->
                            <a id="btn-print-detail" class="btn btn-secondary">
                                <i class="fa-solid fa-print"></i> Print Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
