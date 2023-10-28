@extends('layouts.main')

@section('title')
    Daftar Nama Nilai MBKM | SIA
@endsection

@section('sub-title')
    Daftar Nama Nilai MBKM
@endsection

@section('content')

@if (session()->has('message'))
<div class="swal" data-swal="{{session('message')}}"></div>
@endif

<a href="{{ route('nilaimbkm.create') }}" class="btn usulan btn-success mb-3">+ Nama Nilai MBKM</a>

<table class="table table-responsive-lg text-center table-bordered table-striped" style="width:100%" id="datatables">
  <thead class="table-dark">
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">Nama judul program</th>
      <th class="text-center" scope="col">Nama Nilai</th>
      <th class="text-center" scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <td>1</td>
          <td>AI for StartUp</td>
          <td>Metode Penelitian AI</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>AI for StartUp</td>
          <td>Logika dan Konsep Teknologi AI</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>AI for StartUp</td>
          <td>Pemrograman Python</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
  </tbody>
</table>
@endsection
