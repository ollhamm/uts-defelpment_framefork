@extends('layouts.app')

@section('title', 'Home')


@section('content')

    <!-- Main Content -->
    <div class="container mt-3">
        <div class="row fade-in">
            <div class="col-md-8">
                <div class="row rounded shadow">
                    <!-- Card 1 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='{{ route('mpasient') }}';" style="cursor: pointer;">
                            <img src="{{ asset('images/manag.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Manajemen Pasien</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='{{ route('pemeriksaan') }}';"
                            style="cursor: pointer;">
                            <img src="{{ asset('images/bookes.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Pemeriksaan</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='{{ route('reagensia') }}';" style="cursor: pointer;">
                            <img src="{{ asset('images/inven.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Inventaris Reagensia</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='{{ route('instrumen') }}';" style="cursor: pointer;">
                            <img src="{{ asset('images/monitor.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Monitoring Instrumen</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='#';" style="cursor: pointer;">
                            <img src="{{ asset('images/passient.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Pasien : <strong class="text-danger">{{ $totalPatientsCount }}</strong></h5>
                                
                            </div>
                        </div>
                    </div>                    
                    <!-- Card 6 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='#';" style="cursor: pointer;">
                            <img src="{{ asset('images/kunjungan.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Kunjungan Labolaturium</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Column -->
            <div class="col-md-4 mb-4">
                <div class="container-right text-center text-bold">
                    <span style="font-weight: bold; color: #7fbf7f;"> <i class="fa-solid fa-notes-medical"></i> RSU Cinta
                        Kasih</span>
                </div>
            </div>
        </div>
    </div>
@endsection
