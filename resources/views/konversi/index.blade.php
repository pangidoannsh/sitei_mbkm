@extends('layouts.main')

@section('title')
    Daftar Konversi Mahasiswa | SIA ELEKTRO
@endsection

@section('sub-title')
    Daftar Konversi Mahasiswa
@endsection

@section('content')

@if (session()->has('message'))
<div class="swal" data-swal="{{session('message')}}"></div>
@endif

<a href="{{ route('konversi.create') }}" class="btn usulan btn-success mb-3">+ Konversi Nilai</a>

<table class="table table-responsive-lg text-center table-bordered table-striped" style="width:100%" id="datatables">
  <thead class="table-dark">
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">Nama</th>
      <th class="text-center" scope="col">Nama Nilai MBKM</th>
      <th class="text-center" scope="col">Nama Mata Kuliah</th>
      <th class="text-center" scope="col">Nilai</th>
      <th class="text-center" scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <td>1</td>
          <td>Fitra Ramadhan</td>
          <td>Pemograman Python</td>
          <td>Rekayasa Web</td>
          <td>92.2</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
  </tbody>
</table>
@endsection
