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

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
</div>
@endif

<div class="container card p-4">

    <ol class="breadcrumb col-lg-12">
        <li class="breadcrumb-item"><a class="breadcrumb-item active fw-bold text-black" href="{{ route('prodi.index') }}">MBKM</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-item" href="{{ route('prodi.riwayat') }}">Riwayat</a></li>  
      </ol>

<div class="container-fluid">

    <table class="table table-responsive-lg table-bordered table-striped" width="100%" id="datatables">
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
            @foreach ($mbkm as $km )

            @if ($km->status == 'Nilai sudah keluar')

            @else
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $km->mahasiswa->nim }}</td>
                    <td class="text-center">{{ $km->mahasiswa->nama }}</td>
                    <td class="text-center">{{ $km->mahasiswa->angkatan }}</td>
                    <td class="text-center">{{ $km->program->name }}</td>
                    <td class="text-center">{{ $km->perusahaan }}</td>
                    <td class="text-center ">{{ $km->judul }}</td>
                    @if ($km->status == 'Nilai sudah keluar')
                        <td class="text-center bg-success">{{$km->status}}</td>
                    @elseif($km->status == 'Ditolak')
                        <td class="text-center bg-danger">{{ $km->status }}</td>
                    @elseif($km->status == 'Konversi Ditolak')
                        <td class="text-center bg-danger">{{ $km->status }}</td>
                    @else
                        <td class="text-center bg-warning">{{$km->status}}</td>
                    @endif
                    <td class="text-center">{{ $km->priode_kegiatan }}</td>
                    <td class="text-center text-danger text-bold">{{ $km->batas }}</td>
                    <td class="text-center">
                    @if ($km->status == 'Usulan')
                        <a href="{{ route('revisi.detail', $km->id) }}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                        <form action="/prodi/approve/{{$km->id}}" method="POST"  style="display: inline;">
                            @csrf
                        <button type="submit" class="badge btn btn-info p-1 mb-1"><i class="fas fa-check"></i></button>
                        </form>
                        <form action="/prodi/tolakusulan/{{ $km->id }}" method="POST"  style="display: inline;">
                            @csrf
                            <button type="submit" class="badge btn btn-danger p-1.5 mb-2"><i class="fas fa-times"></i></button>
                        </form>
                    @elseif($km->status == 'Usulan konversi nilai')
                        <a href="{{ route('revisi.detail', $km->id) }}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                        <form action="/prodi/approvekonversi/{{$km->id}}" method="POST" style="display: inline;">
                            @csrf
                        <button type="submit" class="badge btn btn-info p-1 mb-1"><i class="fas fa-check"></i></button>
                        </form>
                        <form action="/prodi/tolakkonversi/{{ $km->id }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="badge btn btn-danger p-1.5 mb-2"><i class="fas fa-times"></i></button>
                        </form>
                    @else
                       <a href="{{ route('revisi.detail', $km->id) }}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                    @endif

                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>


    </table>
</div>
</div>


@endsection

