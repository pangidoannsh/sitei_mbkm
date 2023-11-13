@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    SITEI MBKM | MBKM Prodi
@endsection

@section('sub-title')
    MBKM Mahasiswa Prodi
@endsection

@section('content')


<div class="container card p-4">

    <div class="container-fluid">
        <table class="table table-responsive-lg table-bordered " width="100%" id="datatables">
            <thead class="table-dark">
            <tr>
                    <th class="text-center" scope="col">NO</th>
                    <th class="text-center" scope="col">NIM</th>
                    <th class="text-center" scope="col">Nama</th>
                    <th class="text-center" scope="col">Periode Semester</th>
                    <th class="text-center" scope="col">Jenis MBKM</th>
                    <th class="text-center" scope="col">Lokasi MBKM</th>
                    <th class="text-center" scope="col">Judul MBKM</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Periode Kegiatan</th>
                    <th class="text-center" scope="col">Batas Waktu</th>
                    <th class="text-center px-5" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">2007135748</td>
                        <td class="text-center">Muhammad Abdullah Qosim</td>
                        <td class="text-center">Genap</td>
                        <td class="text-center">Magang</td>
                        <td class="text-center">Bank Indonesia</td>
                        <td class="text-center ">FullStack Web Developer</td>
                        <td class="text-center bg-success">Konversi Diterima</td>
                        <td class="text-center">16 Februari 2023 - 30 Juni 2023</td>
                        <td class="text-center text-danger text-bold">25 Januari 2023</td>
                        <td class="text-center">
                            <a href="{{ route('pdf') }}" target="_blank" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection

