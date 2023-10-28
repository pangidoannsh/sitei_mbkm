@extends('layouts.main')

@section('title')
    Daftar Mata Kuliah | SIA ELEKTRO
@endsection

@section('sub-title')
    Daftar Mata Kuliah
@endsection

@section('content')

@if (session()->has('message'))
<div class="swal" data-swal="{{session('message')}}"></div>
@endif

<a href="/matkul/create" class="btn usulan btn-success mb-3">+ Mata Kuliah</a>

<table class="table table-responsive-lg text-center table-bordered table-striped" style="width:100%" id="datatables">
  <thead class="table-dark">
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">Semester</th>
      <th class="text-center" scope="col">Nama Mata Kuliah</th>
      <th class="text-center" scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <td>1</td>
          <td>7</td>
          <td>Rekayasa Web</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>7</td>
          <td>Rekayasa Web</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>7</td>
          <td>Rekayasa Web</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>4</td>
          <td>7</td>
          <td>Rekayasa Web</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>5</td>
          <td>7</td>
          <td>Rekayasa Web</td>
          <td class="text-center">
            <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
            <button class="btn btn-dark"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
  </tbody>
</table>
@endsection
