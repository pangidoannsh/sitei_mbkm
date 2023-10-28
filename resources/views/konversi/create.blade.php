@extends('layouts.main')

@section('title')
    Konversi Nilai MBKM | SIA ELEKTRO
@endsection

@section('sub-title')
    Konversi Nilai MBKM
@endsection

@section('content')

<form action="{{url ('/konversi/create')}}" method="POST" enctype="multipart/form-data">
        @csrf
<div>
    <div class="row">
        <div class="col-6-lg">
            <div class="mb-3 field">
                <label for="program" class="form-label">Nama Nilai MBKM</label>
                <select name="program" class="form-select">
                    <option value="1">Metode Penelitian AI</option>
                    <option value="2">Pemograman Python</option>
                    <option value="3">Deployment</option>
                </select>
            </div>
            <div class="mb-3 field">
                <label for="program" class="form-label">Nama Mata Kuliah</label>
                <select name="program" class="form-select">
                    <option value="1">Rekayasa Web</option>
                    <option value="2">Kewirausahaan</option>
                    <option value="3">Komputer Grafis</option>
                </select>
            </div>

        <div class="mb-3 field">
            <label class="form-label">Nilai MBKM</label>
            <input type="number" name="nilai" class="form-control " >

        </div>
        <button type="submit" class="btn btn-success float-right mt-4">Tambah</button>
        </div>
    </div>
</div>
</form>

@endsection

