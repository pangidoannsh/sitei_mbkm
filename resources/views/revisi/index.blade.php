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

        <ul class="bs4-order-tracking">
            <li class="step aktip">
                <div>
                    <i class="fas"></i>
            </div>
            <p class="mt-3"> USULAN MBKM</p>
            </li>
            <li class="step ">
                <div><i class="fas "></i>
            </div> <p class="mt-3"> SURAT PERUSAHAAN </p>
        </li>
            <li class="step ">
                <div><i class="fas "></i>
            </div> <p class="mt-3"> UPLOAD SERTIFIKAT </p>
        </li>
            <li class="step">
                <div><i class="fas fa-truc"></i>
            </div><p class="mt-3">KONVERSI NILAI </p>
        </li>


        <div class="row biru mb-4">
        <div class="col">
            <span class="mt-3 "> Tanggal Diterima <br></span>
            <span class="mt-3  text-bold"></span>
        </div>
        <div class="col"><span class="mt-3 text"> Batas Unggah <br></span>
            <strong class="mt-3 text-danger"><strong class="text-bold" id="timer-batas-balasan"></strong><br></strong>
        </div>
    </div>
</div>


<div class="card p-4">

    <table class="table table-responsive-lg table-bordered table-striped" width="100%">
        <thead class="table-dark">
            <tr>
                <th class="text-center" scope="col">NIM</th>
                <th class="text-center" scope="col">Nama</th>
                <th class="text-center" scope="col">Periode Semester</th>
                <th class="text-center" scope="col">Jenis Usulan</th>
                <th class="text-center" scope="col">Judul MBKM</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col">Periode Kegiatan</th>
                <th class="text-center" scope="col">Batas Waktu</th>
                <th class="text-center px-5" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td class="text-center">2007135748</td>
                    <td class="text-center">Fitra Ramadhan</td>
                    <td class="text-center">Ganjil</td>
                    <td class="text-center">Studi Independen</td>
                    <td class="text-center ">FullStack Web Developer</td>
                    <td class="text-center bg-warning">Belum Disetujui</td>
                    <td class="text-center">30 Oktober 2023 - 30 Desember 2023</td>
                    <td class="text-center text-danger text-bold">25 Oktober 2023</td>
                    <td class="text-center">
                        <a href="{{ route('revisi.detail') }}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                        <a href="/balasankp/create/" class="badge  " data-bs-toggle="tooltip" title="Unggah Surat Balasan Perusahaan"><img height="25" width="25" src="/assets/img/add.png"  alt="..." class="zoom-image"></a>
                        <a href="{{ route('usulan.create') }}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Tambah Usulan"><i class="fas fa-plus"></i></a>
                    </td>
                </tr>

        </tbody>


    </table>
    </div>
</div>
@endsection
