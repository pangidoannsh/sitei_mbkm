@extends('layouts.main')

@section('title')
    Upload Sertifikat | SIA ELEKTRO
@endsection

@section('sub-title')
    Upload Sertifikat
@endsection

@section('content')

<form action="{{route('sertifikat.create')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div>
<div class="row">
    <div class="col-6-lg">
        <div class="mb-3">
            <label for="formFile" class="form-label">Sertifikat</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" accept=".jpg,.gif,.png" id="image" name="image">
        </div>
    <button type="submit" class="btn btn-success float-right mt-4">Tambah</button>
    </div>
</div>
</div>
</form>

@endsection

