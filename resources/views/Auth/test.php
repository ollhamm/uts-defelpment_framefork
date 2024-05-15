<div class="card-header text-center"
                                 style="font-weight: bold; background-color: #7fbf7f; color: white;">
                                Identitas Pasien <br />
                                {{ $patient->rm }}
                            </div>





                            <!-- Card untuk Detail Pemeriksaan -->
                            <div class="container mb-5">
                                <div class="card-header text-center"
                                     style="font-weight: bold; background-color: #7fbf7f; color: white;">
                                    Amnesis Dokter : <br />
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


                            <div class="card-header text-center"
                                     style="font-weight: bold; background-color: #7fbf7f; color: white;">
                                    Tindakan Pelayanan Laboratorium : <br />
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









