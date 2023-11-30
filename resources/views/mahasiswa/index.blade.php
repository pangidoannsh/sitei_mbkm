@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    SITEI MBKM | Usulan MBKM
@endsection

@section('sub-title')
    Usulan MBKM
@endsection

@section('content')


@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
</div>
@endif


<div class="container-fluid">
    <div class="card card-timeline px-2 border-none">
        <h5 class="text-center">
        <div class="row text-center justify-content-center mb-5">
                <div class="col-xl-6 col-lg-8">
                    <!-- <h2 class="font-weight-bold mt-3">Timeline Progress Kerja Praktek</h2> -->
                    <!-- <p class="text-muted">We’re very proud of the path we’ve taken. Explore the history that made us the company we are today.</p> -->
                </div>
            </div>
    @foreach ($mbkm->take(1) as $km )
            @if ($km->status == 'Usulan')
            <ul class="bs4-order-tracking">
                <li class="step">
                    <div>
                        <i class="fas"></i>
                </div>
                <p class="mt-3"> USULAN MBKM</p>
                </li>
                <li class="step">
                    <div><i class="fas "></i>
                </div> <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
            </li>
                <li class="step">
                    <div><i class="fas "></i>
                </div> <p class="mt-3"> KONVERSI NILAI </p>
            </li>
                <li class="step">
                    <div><i class="fas fa-truc"></i>
                </div><p class="mt-3"> SELESAI PROGRAM </p>
            </li>


            <div class="row biru mb-4">
            <div class="col">
                <span class="mt-3 "> Tanggal Diterima <br></span>
                <span class="mt-3  text-warning">{{ $km->batas }}</span>
            </div>
            <div class="col"><span class="mt-1 text"> Batas Unggah <br></span>
                <strong class="mt-3 text-danger">Akhir Program<strong class="text-bold" id="#"></strong><br></strong>
            </div>
            <div class="col"><span class="mt-1 text">Status Konversi <br></span>
                <strong class="mt-3 text-warning">Proses Konversi<strong class="text-bold" id="#"></strong><br></strong>
            </div>
        </div>


            {{-- satu terima --}}
        @elseif ($km->status == 'Usulan disetujui')
            <ul class="bs4-order-tracking">
                <li class="step active">
                    <div>
                        <i class="fas"></i>
                </div>
                <p class="mt-3"> USULAN MBKM</p>
                </li>
                <li class="step">
                    <div><i class="fas "></i>
                </div> <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
            </li>
                <li class="step">
                    <div><i class="fas "></i>
                </div> <p class="mt-3"> KONVERSI NILAI </p>
            </li>
                <li class="step">
                    <div><i class="fas fa-truc"></i>
                </div><p class="mt-3"> SELESAI PROGRAM </p>
            </li>


            <div class="row biru mb-4">
            <div class="col">
                <span class="mt-3 "> Tanggal Diterima <br></span>
                <span class="mt-3  text-warning">{{ $km->batas }}</span>
            </div>
            <div class="col"><span class="mt-1 text"> Batas Unggah <br></span>
                <strong class="mt-3 text-danger">Akhir Program<strong class="text-bold" id="#"></strong><br></strong>
            </div>
            <div class="col"><span class="mt-1 text">Status Konversi <br></span>
                <strong class="mt-3 text-warning">Proses Konversi<strong class="text-bold" id="#"></strong><br></strong>
            </div>
        </div>

        @elseif ($km->status == 'MBKM sedang berjalan')
            <ul class="bs4-order-tracking">
                <li class="step active">
                    <div>
                        <i class="fas"></i>
                </div>
                <p class="mt-3"> USULAN MBKM</p>
                </li>
                <li class="step">
                    <div><i class="fas "></i>
                </div> <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
            </li>
                <li class="step">
                    <div><i class="fas "></i>
                </div> <p class="mt-3"> KONVERSI NILAI </p>
            </li>
                <li class="step">
                    <div><i class="fas fa-truc"></i>
                </div><p class="mt-3"> SELESAI PROGRAM </p>
            </li>


            <div class="row biru mb-4">
            <div class="col">
                <span class="mt-3 "> Tanggal Diterima <br></span>
                <span class="mt-3  text-warning">{{ $km->batas }}</span>
            </div>
            <div class="col"><span class="mt-1 text"> Batas Unggah <br></span>
                <strong class="mt-3 text-danger">Akhir Program<strong class="text-bold" id="#"></strong><br></strong>
            </div>
            <div class="col"><span class="mt-1 text">Status Konversi <br></span>
                <strong class="mt-3 text-warning">Proses Konversi<strong class="text-bold" id="#"></strong><br></strong>
            </div>
        </div>

        @elseif ($km->status == 'Ditolak')
            <ul class="bs4-order-tracking">
                <li class="step aktip">
                    <div>
                        <i class="fas"></i>
                </div>
                <p class="mt-3"> USULAN MBKM</p>
                </li>
                <li class="step">
                    <div><i class="fas "></i>
                </div> <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
            </li>
                <li class="step">
                    <div><i class="fas "></i>
                </div> <p class="mt-3"> KONVERSI NILAI </p>
            </li>
                <li class="step">
                    <div><i class="fas fa-truc"></i>
                </div><p class="mt-3"> SELESAI PROGRAM </p>
            </li>


            <div class="row biru mb-4">
            <div class="col">
                <span class="mt-3 "> Tanggal Diterima <br></span>
                <span class="mt-3  text-warning">{{ $km->batas }}</span>
            </div>
            <div class="col"><span class="mt-1 text"> Batas Unggah <br></span>
                <strong class="mt-3 text-danger">Akhir Program<strong class="text-bold" id="#"></strong><br></strong>
            </div>
            <div class="col"><span class="mt-1 text">Status Konversi <br></span>
                <strong class="mt-3 text-warning">Proses Konversi<strong class="text-bold" id="#"></strong><br></strong>
            </div>
        </div>

        {{-- 2 diterima --}}
        @elseif ($km->status == 'Usulan konversi nilai')
                <ul class="bs4-order-tracking">
                    <li class="step active">
                        <div>
                            <i class="fas"></i>
                    </div>
                    <p class="mt-3"> USULAN MBKM</p>
                    </li>
                    <li class="step active">
                        <div><i class="fas "></i>
                    </div> <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
                </li>
                    <li class="step">
                        <div><i class="fas "></i>
                    </div> <p class="mt-3"> KONVERSI NILAI </p>
                </li>
                    <li class="step">
                        <div><i class="fas fa-truc"></i>
                    </div><p class="mt-3"> SELESAI PROGRAM </p>
                </li>


                <div class="row biru mb-4">
                <div class="col">
                    <span class="mt-3 "> Tanggal Diterima <br></span>
                    <span class="mt-3  text-warning">{{ $km->batas }}</span>
                </div>
                <div class="col"><span class="mt-1 text"> Batas Unggah <br></span>
                    <strong class="mt-3 text-danger">Akhir Program<strong class="text-bold" id="#"></strong><br></strong>
                </div>
                <div class="col"><span class="mt-1 text">Status Konversi <br></span>
                    <strong class="mt-3 text-warning">Proses Konversi<strong class="text-bold" id="#"></strong><br></strong>
                </div>
            </div>

            @elseif ($km->status == 'Konversi Ditolak')
            <ul class="bs4-order-tracking">
                <li class="step active">
                    <div>
                        <i class="fas"></i>
                </div>
                <p class="mt-3"> USULAN MBKM</p>
                </li>
                <li class="step aktip">
                    <div><i class="fas "></i>
                </div> <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
            </li>
                <li class="step">
                    <div><i class="fas "></i>
                </div> <p class="mt-3"> KONVERSI NILAI </p>
            </li>
                <li class="step">
                    <div><i class="fas fa-truc"></i>
                </div><p class="mt-3"> SELESAI PROGRAM </p>
            </li>


            <div class="row biru mb-4">
            <div class="col">
                <span class="mt-3 "> Tanggal Diterima <br></span>
                <span class="mt-3  text-warning">{{ $km->batas }}</span>
            </div>
            <div class="col"><span class="mt-1 text"> Batas Unggah <br></span>
                <strong class="mt-3 text-danger">Akhir Program<strong class="text-bold" id="#"></strong><br></strong>
            </div>
            <div class="col"><span class="mt-1 text">Status Konversi <br></span>
                <strong class="mt-3 text-warning">Proses Konversi<strong class="text-bold" id="#"></strong><br></strong>
            </div>
        </div>


        @elseif ($km->status == 'Nilai sudah keluar')

            <ul class="bs4-order-tracking">
                <li class="step active">
                    <div>
                        <i class="fas"></i>
                </div>
                <p class="mt-3"> USULAN MBKM</p>
                </li>
                <li class="step active">
                    <div><i class="fas "></i>
                </div> <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
            </li>
                <li class="step active">
                    <div><i class="fas "></i>
                </div> <p class="mt-3"> KONVERSI NILAI </p>
            </li>
                <li class="step active">
                    <div><i class="fas fa-truc"></i>
                </div><p class="mt-3"> SELESAI PROGRAM </p>
            </li>


            <div class="row biru mb-4">
            <div class="col">
                <span class="mt-3 "> Tanggal Diterima <br></span>
                <span class="mt-3  text-bold">{{ $km->batas }}</span>
            </div>
            <div class="col"><span class="mt-1 text"> Batas Unggah <br></span>
                <strong class="mt-3 text-danger">Akhir Program<strong class="text-bold" id="#"></strong><br></strong>
            </div>
            <div class="col"><span class="mt-1 text">Status Konversi <br></span>
                <strong class="mt-3 text-warning">Proses Konversi<strong class="text-bold" id="#"></strong><br></strong>
            </div>
        </div>
        @else
        <ul class="bs4-order-tracking">
            <li class="step">
                <div>
                    <i class="fas"></i>
            </div>
            <p class="mt-3"> USULAN MBKM</p>
            </li>
            <li class="step">
                <div><i class="fas "></i>
            </div> <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
        </li>
            <li class="step">
                <div><i class="fas "></i>
            </div> <p class="mt-3"> KONVERSI NILAI </p>
        </li>
            <li class="step">
                <div><i class="fas fa-truc"></i>
            </div><p class="mt-3"> SELESAI PROGRAM </p>
        </li>


        <div class="row biru mb-4">
        <div class="col">
            <span class="mt-3 "> Tanggal Diterima <br></span>
            <span class="mt-3  text-warning">{{ $km->batas }}</span>
        </div>
        <div class="col"><span class="mt-1 text"> Batas Unggah <br></span>
            <strong class="mt-3 text-danger">Akhir Program<strong class="text-bold" id="#"></strong><br></strong>
        </div>
        <div class="col"><span class="mt-1 text">Status Konversi <br></span>
            <strong class="mt-3 text-warning">Proses Konversi<strong class="text-bold" id="#"></strong><br></strong>
        </div>
    </div>
        @endif
        @endforeach
</div>


<button type="button" class="btn btn-success float-left mt-4" data-toggle="modal" data-target="#staticBackdrop">Tambah Usulan</button>
{{-- <button type="button" class="btn btn-success float-left mt-4" data-toggle="modal" data-target="#staticBackdrop" disabled>Tambah Usulan</button> --}}
<br>
<br>
<br>*Segera Hapus Usulan Yang DITOLAK!
<br>
<br>

<div class="card p-4">


    <table class="table table-responsive-lg table-bordered table-striped" width="100%">
        <thead class="table-dark">
            <tr>
                <th class="text-center" scope="col">NIM</th>
                <th class="text-center" scope="col">Nama</th>
                <th class="text-center" scope="col">Periode Semester</th>
                <th class="text-center" scope="col">Jenis MBKM</th>
                <th class="text-center" scope="col">Lokasi MBKM</th>
                <th class="text-center" scope="col">Judul MBKM</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col">Alasan</th>
                <th class="text-center" scope="col">Periode Kegiatan</th>
                <th class="text-center" scope="col">Batas Waktu</th>
                <th class="text-center px-5" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mbkm as $km)
                <tr>
                    <td class="text-center">{{ $km->mahasiswa->nim }}</td>
                    <td class="text-center">{{ $km->mahasiswa->nama }}</td>
                    <td class="text-center">{{ $km->periode_mbkm }}</td>
                    <td class="text-center">{{ $km->program->name }}</td>
                    <td class="text-center">{{ $km->perusahaan }}</td>
                    <td class="text-center ">{{ $km->judul }}</td>

                    @if ($km->status == 'Nilai sudah keluar')
                        <td class="text-center bg-success">{{$km->status}}</td>
                    @elseif($km->status == 'Ditolak')
                        <td class="text-center bg-danger">{{ $km->status }}</td>
                    @elseif($km->status == 'Konversi Ditolak')
                        <td class="text-center bg-danger">{{$km->status}}</td>
                    @else
                        <td class="text-center bg-warning">{{$km->status}}</td>
                    @endif

                    <td class="text-center">{{ $km->catatan }}</td>
                    <td class="text-center">{{ $km->priode_kegiatan }}</td>
                    <td class="text-center text-danger text-bold">{{ $km->batas }}</td>

                    @if ($km->status == 'Usulan disetujui')
                        <td class="text-center">
                            <a href="/mahasiswa/detail/ {{($km->id)}}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                            <a href="{{ route('sertifikat.create') }}" class="badge  " data-bs-toggle="tooltip" title="Unggah Sertifikat"><img height="25" width="25" src="/assets/img/add.png"  alt="..." class="zoom-image"></a>
                            <form action="/mahasiswa/uploaded/{{$km->id}}" method="POST" style="display: inline;">
                            @csrf
                        <button type="submit" class="badge btn btn-info p-1 mb-1"><i class="fas fa-check"></i></button>
                        </form>
                        </td>
                    @elseif ($km->status == 'Konversi Ditolak')
                        <td class="text-center">
                            <a href="/mahasiswa/detail/ {{($km->id)}}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                            <a href="{{ route('sertifikat.create') }}" class="badge  " data-bs-toggle="tooltip" title="Revisi Konversi"><img height="25" width="25" src="/assets/img/add.png"  alt="..." class="zoom-image"></a>
                            <form action="/mahasiswa/uploaded/{{$km->id}}" method="POST" style="display: inline;">
                                @csrf
                            <button type="submit" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Sudah Upload Sertifikat"><i class="fas fa-check"></i></button>
                            </form>
                        </td>
                    @elseif ($km->status == 'Ditolak')
                        <td class="text-center">
                            <a href="/mahasiswa/detail/ {{($km->id)}}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                            <form action="{{ route('mahasiswa.destroy', $km->id) }}}}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge btn btn-danger p-1.5 mb-2"><i class="fas fa-times"></i></button>
                            </form>
                        </td>
                    @else
                        <td class="text-center">
                            <a href="/mahasiswa/detail/ {{($km->id)}}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                        </td>
                    @endif
                </tr>
                @endforeach
        </tbody>


    </table>
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Usulan MBKM</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div>
                <div class="row">
                    <div class="col-6-lg">
                        <div class="mb-3 field">
                            <input type="hidden" name="mahasiswa_nim" value="2007135748" >
                            <input type="hidden" name="prodi_id" value="3">
                            <input type="hidden" name="konsentrasi_id" value="4">

                            <div class="mb-3 field">
                                <label class="form-label">Periode (Ganjil 2023)</label>
                                <input type="text" id="periode_mbkm" name="periode_mbkm" class="form-control " >

                            </div>
                            <label for="program" class="form-label">Program MBKM</label>
                            <select id="program_id" name="program_id"  class="form-select">
                                @foreach ($program as $pro )
                                <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    <div class="mb-3 field">
                        <label class="form-label">Lokasi (Perusahaan/Instansi)</label>
                        <input type="text" id="perusahaan" name="perusahaan" class="form-control " >

                    </div>
                    <div class="mb-3 field">
                        <label class="form-label">Alamat Perusahaan/Instansi</label>
                        <input type="text" id="alamat" name="alamat" class="form-control " >

                    </div>
                    <div class="mb-3 field">
                        <label class="form-label">Bidang Usaha</label>
                        <input type="text" id="bidang_usaha" name="bidang_usaha" class="form-control " >

                    </div>
                    <div class="mb-3 field">
                        <label class="form-label">Judul Kegiatan</label>
                        <input type="text" id="judul" name="judul" class="form-control">
                    </div>
                    <div class="mb-3 field">
                        <label for="formFile" class="form-label">Rincian Kegiatan (PDF)</label>
                        {{-- <input class="form-control" type="file" accept=".pdf" id="rincian" id="" name="rincian"> --}}
                        <input class="form-control @error('rincian') is-invalid @enderror" type="file" accept=".jpg, .png, .pdf" id="rincian" name="rincian">
                    </div>
                    <div class="mb-3 field">
                        <label class="form-label">Periode Kegiatan (dd/mm/yyyy - dd/mm/yyyy)</label>
                        <input type="text" id="priode_kegiatan" name="priode_kegiatan" class="form-control " >

                    </div>
                    <div class="mb-3 field">
                        <label class="form-label">Batas Waktu Penawaran</label>
                        <input type="date" id="batas" name="batas" class="form-control " >

                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success float-right mt-4">Usulkan</button>
        </div>
    </form>
      </div>
    </div>
</div>

@endsection
