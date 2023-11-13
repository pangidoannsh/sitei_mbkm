@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    SITEI MBKM | MBKM Prodi
@endsection

@section('sub-title')
    MBKM Mahasiswa Prodi
@endsection

@section('content')

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
</div>
@endif

<div class="container card p-4">

    <ol class="breadcrumb col-lg-12">

        <div class="btn-group menu-dosen scrollable-btn-group col-md-12">

            <a href="{{ route('prodi.index') }}" class="btn bg-light border  border-bottom-0 ">
                <span class="button-text">Usulan MBKM</span>
                </a>

                <a href="{{ route('prodi.sertifikat') }}"  class="btn bg-light border  border-bottom-0 " >
                <span class="button-text">Sertifikat</span>
                </a>

                <a href="{{ route('prodi.konversi') }}"  class="btn btn-outline-success border  border-bottom-0 active"  >
                <span class="button-text">Konversi Nilai</span>
                </a>
                <a href="{{ route('prodi.riwayat') }}"  class="btn bg-light border  border-bottom-0 "  >
                    <span class="button-text">Riwayat</span>
                </a>
        </div>

    </ol>

<div class="container-fluid">

    <table class="table table-responsive-lg table-bordered table-striped" width="100%" id="datatables">
        <thead class="table-dark">
            <tr>
                <th class="text-center" scope="col">NO</th>
                <th class="text-center" scope="col">NIM</th>
                <th class="text-center" scope="col">Nama</th>
                <th class="text-center" scope="col">Periode Semester</th>
                <th class="text-center" scope="col">Jenis MBKM</th>
                <th class="text-center" scope="col">Lokasi MBKM</th>
                <th class="text-center" scope="col">Judul MBKM</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col">Periode Kegiatan</th>
                <th class="text-center" scope="col">Batas Waktu</th>
                <th class="text-center px-5" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">2007135748</td>
                    <td class="text-center">Fitra Ramadhan</td>
                    <td class="text-center">Ganjil</td>
                    <td class="text-center">Studi Independen</td>
                    <td class="text-center">Arkatama Solusindo</td>
                    <td class="text-center ">FullStack Web Developer</td>
                    <td class="text-center bg-warning">Belum Disetujui</td>
                    <td class="text-center">30 Oktober 2023 - 30 Desember 2023</td>
                    <td class="text-center text-danger text-bold">25 Oktober 2023</td>
                    <td class="text-center">
                        <a href="{{ route('revisi.detail') }}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                    </td>
                </tr>
        </tbody>


    </table>
</div>
</div>


@endsection

