@extends('layouts.main')

@section('title')
    Daftar Mahasiswa | SIA ELEKTRO
@endsection

@section('sub-title')
    Daftar Mahasiswa
@endsection

@section('content')

@if (session()->has('message'))
<div class="swal" data-swal="{{session('message')}}"></div>
@endif

<a href="/mahasiswa/create" class="btn mahasiswa btn-success mb-3">+ Mahasiswa</a>

<table class="table table-responsive-lg text-center table-bordered table-striped" style="width:100%" id="datatables">
  <thead class="table-dark">
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">NIM</th>
      <th class="text-center" scope="col">Nama</th>
      <th class="text-center" scope="col">Angkatan</th>
      <th class="text-center" scope="col">Periode</th>
      <th class="text-center" scope="col">Program Studi</th>
      <th class="text-center" scope="col">Konsentrasi</th>
      <th class="text-center" scope="col">MBKM</th>
      <th class="text-center" scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <td>1</td>
          <td>2007135748</td>
          <td>Fitra Ramadhan</td>
          <td>2020</td>
          <td>Ganjil 2023</td>
          <td>Teknik Informatika</td>
          <td>RPL</td>
          <td>FullStack Web Developer</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>2007135748</td>
          <td>Fitra Ramadhan</td>
          <td>2020</td>
          <td>Ganjil 2023</td>
          <td>Teknik Informatika</td>
          <td>RPL</td>
          <td>FullStack Web Developer</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>2007135748</td>
          <td>Fitra Ramadhan</td>
          <td>2020</td>
          <td>Ganjil 2023</td>
          <td>Teknik Informatika</td>
          <td>RPL</td>
          <td>FullStack Web Developer</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
  </tbody>
</table>
{{-- script print halaman --}}
{{-- <script>window.print()</script> --}}

@endsection
