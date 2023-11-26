@extends('layouts.main')

@section('title')
    Upload Sertifikat | SIA ELEKTRO
@endsection

@section('sub-title')
    Upload Sertifikat dan Konversi Nilai
@endsection

@section('content')

<div class="container-fluid">
    <a href="{{ route('revisi.index') }}" class="badge bg-success p-2 mb-3 "> Kembali <a>
      </div>
<form action="{{route('sertifikat.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-6-lg">
        <div class="mb-3">
            <input type="hidden" name="mahasiswa_nim" value="2007135748" >
            <label for="file" class="form-label">Sertifikat</label>
            <input class="form-control @error('file') is-invalid @enderror" type="file" accept=".jpg, .png, .pdf" id="file" name="file">
        </div>
    </div>
</div>
<br><br>

<label for="formFile" class="form-label">Konversi Nilai</label>
<br>
<a href="#" data-toggle="modal" data-target="#staticBackdrop" class="btn mahasiswa btn-success mb-3">+ Konversi</a>

<br>
    <button type="submit" class="btn btn-success sticky-bottom mt-4" style="position: absolute;bottom: 150px;right: 190px;">Kirim</button>
</form>

<table class="table table-responsive-lg table-bordered table-striped" width="100%">
    <thead class="table-dark">
       <tr>
            <th class="text-center" scope="col">NO</th>
            <th class="text-center" scope="col">Nama Mata Kuliah</th>
            <th class="text-center" scope="col">Nama Nilai MBKM</th>
            <th class="text-center" scope="col">Nilai Konversi</th>
            <th class="text-center" scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($konversi as $kr)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $kr->nama_nilai_matkul }}</td>
                <td class="text-center">{{ $kr->nama_nilai_mbkm }}</td>
                <td class="text-center">{{ $kr->nilai_mbkm }}</td>
                <td class="text-center">
                    <form onsubmit="return confirm(' Hapus package? ');" action="{{ route('sertifikat.destroykonversi',[$kr->id]) }}" method="POST"  style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="badge btn btn-danger p-1.5 mb-2"><i class="fas fa-times"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>


</table>
<br><br>
<br><br>
<br><br>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Konversi Nilai MBKM</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('sertifikat.storekonversi') }}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-6-lg">
                    <input type="hidden" name="mahasiswa_nim" value="2007135748" >
                    <div class="mb-3 field">
                        <label for="nama_matkul" class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama_nilai_matkul" class="form-control" >
                    </div>
                    <div class="mb-3 field">
                        <label for="kode_matkul" class="form-label">Kode Mata Kuliah</label>
                        <input type="text" name="kode_matkul" class="form-control" >
                    </div>
                    <div class="mb-3 field">
                        <label for="sks" class="form-label">SKS</label>
                        <input type="text" name="sks" class="form-control" >
                    </div>
                    <div class="mb-3 field">
                        <label for="jenis_matkul" class="form-label">Jenis Mata Kuliah</label>
                        <select name="jenis_matkul" class="form-select">
                            <option value="W">W</option>
                            <option value="P">P</option>
                        </select>
                    </div>
                    <div class="mb-3 field">
                        <label for="nama_nilai_mbkm" class="form-label">Nama Nilai MBKM</label>
                        <input type="text" name="nama_nilai_mbkm" class="form-control" >
                    </div>

                <div class="mb-3 field">
                    <label class="form-label">Nilai MBKM</label>
                    <input type="text" name="nilai_mbkm" class="form-control " >

                </div>

                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success float-right mt-4" onclick="submitForm(this);">Tambah</button>
        </div>
    </form>
      </div>
    </div>
</div>
<script>
    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }
</script>

@endsection

