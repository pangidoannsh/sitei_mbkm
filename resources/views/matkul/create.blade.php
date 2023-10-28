@extends('layouts.main')

@section('title')
    Tambah Mata Kuliah | SIA ELEKTRO
@endsection

@section('sub-title')
    Tambah Mata Kuliah
@endsection

@section('content')

<form action="{{url ('/matkul/create')}}" method="POST" enctype="multipart/form-data">
        @csrf
<div>
    <div class="row">
        <div class="col-6-lg">
        <div class="mb-3 field">
            <label class="form-label">Semester Mata Kuliah</label>
            <input type="number" name="semester" class="form-control">

        </div>

        <div class="mb-3 field">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama" class="form-control " >

        </div>
        <button type="submit" class="btn btn-success float-right mt-4">Tambah</button>
        </div>
    </div>
</div>
</form>

@endsection

