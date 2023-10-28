@extends('layouts.main')

@section('title')
    Tambah Nama Nilai MBKM | SIA ELEKTRO
@endsection

@section('sub-title')
    Tambah Nama Nilai MBKM
@endsection

@section('content')

<form action="{{url ('/nilaimbkm/create')}}" method="POST" enctype="multipart/form-data">
        @csrf
<div>
    <div class="row">
        <div class="col-6-lg">
        <div class="mb-3 field">
            <label class="form-label">Nama Judul Program</label>
            <input type="text" name="title" class="form-control">

        </div>

        <div class="mb-3 field">
            <label class="form-label">Nama Nilai</label>
            <input type="text" name="nama" class="form-control " >

        </div>
        <button type="submit" class="btn btn-success float-right mt-4">Tambah</button>
        </div>
    </div>
</div>
</form>

@endsection

