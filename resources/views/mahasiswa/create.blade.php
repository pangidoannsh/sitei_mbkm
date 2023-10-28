@extends('layouts.main')

@section('title')
    Tambah Mahasiswa | SIA ELEKTRO
@endsection

@section('sub-title')
    Tambah Mahasiswa
@endsection

@section('content')

<form action="{{url ('/mahasiswa/create')}}" method="POST" enctype="multipart/form-data">
        @csrf
<div>
    <div class="row">
        <div class="col">
        <div class="mb-3 field">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control">

        </div>

        <div class="mb-3 field">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control " >

        </div>

        <div class="mb-3 field">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control )" >

        </div>

        <div class="mb-3 field">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">

        </div>

        </div>
        <div class="col-md">
        <div class="mb-3 field">
            <label class="form-label">Angkatan</label>
            <input type="number" name="angkatan" class="form-control" >

        </div>
        <div class="mb-3 field">
            <label class="form-label">Periode</label>
            <input type="text" name="periode" class="form-control" >

        </div>

        <div class="mb-3 field">
            <label for="prodi_id" class="form-label">Program Studi</label>
            <select name="prodi_id" class="form-select">
                <option value="1">Teknik Elektro D3</option>
                <option value="2">Teknik Elektro S1</option>
                <option value="3">Teknik Informatika S1</option>
            </select>
        </div>

        <div class="mb-3 field">
            <label for="konsentrasi_id" class="form-label">Konsentrasi</label>
            <select name="konsentrasi_id" class="form-select trasi_id')">
                <option value="1">RPL</option>
                <option value="1">KCV</option>
                <option value="1">KBJ</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success float-right mt-4">Tambah</button>
        </div>
    </div>
</div>
</form>

@endsection
