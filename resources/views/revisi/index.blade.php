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
                </div> <p class="mt-3">UPLOAD SERTIFIKAT DAN NILAI</p>
            </li>
                <li class="step ">
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
                <span class="mt-3  text-bold"></span>
            </div>
            <div class="col"><span class="mt-1 text"> Batas Unggah <br></span>
                <strong class="mt-3 text-danger">Akhir Program<strong class="text-bold" id="timer-batas-balasan"></strong><br></strong>
            </div>
            <div class="col"><span class="mt-1 text">
            </div>
        </div>
</div>
<button type="button" class="btn btn-success float-left mt-4" data-toggle="modal" data-target="#staticBackdrop">Tambah Usulan</button>
<br>
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
                    <td class="text-center">Arkatama Solusindo</td>
                    <td class="text-center ">FullStack Web Developer</td>
                    <td class="text-center bg-warning">Belum Disetujui</td>
                    <td class="text-center">30 Oktober 2023 - 30 Desember 2023</td>
                    <td class="text-center text-danger text-bold">25 Oktober 2023</td>
                    <td class="text-center">
                        <a href="{{ route('revisi.detail') }}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('sertifikat.create') }}" class="badge  " data-bs-toggle="tooltip" title="Unggah Sertifikat"><img height="25" width="25" src="/assets/img/add.png"  alt="..." class="zoom-image"></a>
                        <a href="{{ route('usulan.create') }}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Tambah Usulan"><i class="fas fa-plus"></i></a>
                    </td>
                </tr>

        </tbody>


    </table>
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Konversi Nilai MBKM</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST">
            @csrf
        <div class="modal-body">
            <div>
                <div class="row">
                    <div class="col-6-lg">
                        <div class="mb-3 field">
                            <label for="program" class="form-label">Program MBKM</label>
                            <select name="program" class="form-select">
                                <option value="1">Studi Independen</option>
                                <option value="2">Magang</option>
                                <option value="3">Lainnya</option>
                            </select>
                        </div>

                    <div class="mb-3 field">
                        <label class="form-label">Lokasi (Perusahaan/Instansi)</label>
                        <input type="text" name="mitra" class="form-control " >

                    </div>
                    <div class="mb-3 field">
                        <label class="form-label">Alamat Perusahaan/Instansi</label>
                        <input type="text" name="mitra" class="form-control " >

                    </div>
                    <div class="mb-3 field">
                        <label class="form-label">Bidang Usaha</label>
                        <input type="text" name="mitra" class="form-control " >

                    </div>
                    <div class="mb-3 field">
                        <label class="form-label">Judul Kegiatan</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3 field">
                        <label for="formFile" class="form-label">Rincian Kegiatan (PDF)</label>
                        <input class="form-control" type="file" accept=".pdf" id="rincian" name="rincian">
                    </div>
                    <div class="mb-3 field">
                        <label class="form-label">Periode Kegiatan (dd/mm/yyyy - dd/mm/yyyy)</label>
                        <input type="text" name="periode" class="form-control " >

                    </div>
                    <div class="mb-3 field">
                        <label class="form-label">Batas Waktu Penawaran</label>
                        <input type="date" name="deadline" class="form-control " >

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
