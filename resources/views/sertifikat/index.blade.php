@extends('layouts.main')

@section('title')
    Daftar Sertifikat Mahasiswa | SIA ELEKTRO
@endsection

@section('sub-title')
    Daftar Sertifikat Mahasiswa
@endsection

@section('content')

@if (session()->has('message'))
<div class="swal" data-swal="{{session('message')}}"></div>
@endif

<a href="{{ route('sertifikat.create') }}" class="btn usulan btn-success mb-3">+ Sertifikat</a>

<table class="table table-responsive-lg text-center table-bordered table-striped" style="width:100%" id="datatables">
  <thead class="table-dark">
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">NIM</th>
      <th class="text-center" scope="col">Nama</th>
      <th class="text-center" scope="col">Periode Semester</th>
      <th class="text-center" scope="col">Program</th>
      <th class="text-center" scope="col">Sertifikat</th>
      <th class="text-center" scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <td>1</td>
          <td>2007135748</td>
          <td>Fitra Ramadhan</td>
          <td>Ganjil 2023</td>
          <td>Studi Independen</td>
          <td>*IMAGE</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
  </tbody>
</table>
@endsection
