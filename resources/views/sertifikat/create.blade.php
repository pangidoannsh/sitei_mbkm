@extends('layouts.main')

@section('title')
    Upload Sertifikat | SIA ELEKTRO
@endsection

@section('sub-title')
    Upload Sertifikat dan Konversi Nilai
@endsection

@section('content')

<form action="{{route('sertifikat.create')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-6-lg">
        <div class="mb-3">
            <label for="formFile" class="form-label">Sertifikat</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" accept=".jpg, .png, .pdf" id="image" name="image">
        </div>
    </div>
</div>
<br><br>

<label for="formFile" class="form-label">Konversi Nilai</label>
<br>
<a href="#" data-toggle="modal" data-target="#staticBackdrop" class="btn mahasiswa btn-success mb-3">+ Konversi</a>

<br>
    <table class="table table-responsive-lg table-bordered table-striped" width="100%">
        <thead class="table-dark">
           <tr>
                <th class="text-center" scope="col">NO</th>
                <th class="text-center" scope="col">Kode Mata Kuliah</th>
                <th class="text-center" scope="col">Nama Nilai MBKM</th>
                <th class="text-center" scope="col">Nilai Konversi</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">TIS323</td>
                    <td class="text-center">Metode Penelitian AI</td>
                    <td class="text-center">93.3</td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-center">TIS323</td>
                    <td class="text-center">Metode Penelitian AI</td>
                    <td class="text-center">93.3</td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-center">TIS323</td>
                    <td class="text-center">Metode Penelitian AI</td>
                    <td class="text-center">93.3</td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td class="text-center">TIS323</td>
                    <td class="text-center">Metode Penelitian AI</td>
                    <td class="text-center">93.3</td>
                </tr>
                <tr>
                    <td class="text-center">5</td>
                    <td class="text-center">TIS323</td>
                    <td class="text-center">Metode Penelitian AI</td>
                    <td class="text-center">93.3</td>
                </tr>
                <tr>
                    <td class="text-center">6</td>
                    <td class="text-center">TIS323</td>
                    <td class="text-center">Metode Penelitian AI</td>
                    <td class="text-center">93.3</td>
                </tr>

        </tbody>


    </table>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Konversi Nilai MBKM</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="#" method="POST">
                @csrf
            <div class="modal-body">
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

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success float-right mt-4">Tambah</button>
            </div>
        </form>
          </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success float-right mt-4">Kirim</button>
</form>

@endsection

