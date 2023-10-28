@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    SITEI MBKM | Detail Mahasiswa
@endsection

@section('sub-title')
    Detail Mahasiswa
@endsection
<style>

</style>
@section('content')

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
</div>
@endif


<div class="container-fluid">
  <a href="{{ route('revisi.index') }}" class="badge bg-success p-2 mb-3 "> Kembali <a>
    </div>

  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="text-bold">Mahasiswa</h5>
      <hr>
        <p class="card-title text-secondary text-sm " >Nama</p>
        <p class="card-text text-start" >Fitra Ramadhan</p>
        <p class="card-title text-secondary text-sm " >NIM</p>
        <p class="card-text text-start" >2007135748</p>
        <p class="card-title text-secondary text-sm " >Program Studi</p>
        <p class="card-text text-start" >Teknik Informatika</p>
        <p class="card-title text-secondary text-sm " >Konsentrasi</p>
        <p class="card-text text-start" >Rekayasa Perangkat Lunak</p>

      </div>
    </div>


     <div class="card">
      <div class="card-body">
        <h5 class="text-bold">Sertifikat dan Transkrip Nilai</h5>
        <hr>
        <p class="card-title text-secondary text-sm" >Sertifikat</p>
        <p class="card-text text-start " >Belum Upload</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
<div class="card-body">
      <h5 class="text-bold">Data Lokasi MBKM</h5>
      <hr>

<p class="card-title text-secondary text-sm" >Nama Perusahaan</p>
        <p class="card-text text-start" >Arkatama Solusindo</p>

        <p class="card-title text-secondary text-sm" >Alamat Perusahaan</p>
        <p class="card-text text-start"> Pandau Permai</p>

        <p class="card-title text-secondary text-sm" >Bidang Usaha/Kegiatan</p>
        <p class="card-text text-start" >Jasa</p>
        <p class="card-title text-secondary text-sm " >KRS Semester Berjalan</p>
        <p class="card-text text-start " ><button  onclick="#" formtarget="_blank" target="_blank"class="badge bg-dark px-3 p-1">Buka</button></p>
        <p class="card-title text-secondary text-sm " >Transkip Nilai</p>
        <p class="card-text text-start " ><button  onclick="#" formtarget="_blank" target="_blank"class="badge bg-dark px-3 p-1">Buka</button></p>

        <p class="card-title text-secondary text-sm" >Periode Kegiatan</p>
        <p class="card-text text-start mb-md-4"> 30 Oktober 2023 - 30 Desember 2023</p>

    </div>
  </div>

  </div>
</div>


    <div class="card">
      <div class="card-body">
        <h5 class="text-bold">Konversi Nilai</h5>
        <hr>
        <p class="card-title text-secondary text-sm" >Metode Penelitian AI</p>
        <p class="card-text text-start" ><span >Rekayasa Web 93.3</span></p>
        <p class="card-title text-secondary text-sm" >Metode Penelitian AI</p>
        <p class="card-text text-start" ><span >Rekayasa Web 93.3</span></p>
        <p class="card-title text-secondary text-sm" >Metode Penelitian AI</p>
        <p class="card-text text-start" ><span >Rekayasa Web 93.3</span></p>
        <p class="card-title text-secondary text-sm" >Metode Penelitian AI</p>
        <p class="card-text text-start" ><span >Rekayasa Web 93.3</span></p>
        {{-- <div class="float-right">
            <div class="row">
                <div class="col">
                 <button onclick="#"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
            </div>
                <div class="col">
                    <form action="#" class="setujui-usulankp-koordinator" method="POST">
                        @method('put')
                        @csrf
                        <button class="btn btn-success badge p-2 px-3 mb-3">Setujui</i></button>
                    </form>
                </div>
          </div>
        </div> --}}
        {{-- <p class="card-title text-secondary text-sm" >Status</p>
        <p class="card-text text-start" ><span class="badge p-2 bg-secondary text-bold pr-3 pl-3" style="border-radius:20px;"></span></p>
        <p class="card-title text-secondary text-sm" >Keterangan</p>
        <p class="card-text text-start" ><span></span></p> --}}
      </div>
    </div>

<div class="mb-5 mt-3 float-right">
    <div class="row row-cols-2">
        <div class="col">
         <button onclick="#"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
    </div>
    <div class="col">
        <form action="#" class="setujui-usulankp-koordinator" method="POST">
            @method('put')
            @csrf
            <button class="btn btn-success badge p-2 px-3 mb-3">Setujui</i></button>
        </form>
    </div>
  </div>

</div>
    <br>
    <br>
    <br>

@endsection
