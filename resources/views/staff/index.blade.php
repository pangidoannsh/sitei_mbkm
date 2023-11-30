@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    SITEI MBKM | MBKM Staff
@endsection

@section('sub-title')
    MBKM Mahasiswa Staff
@endsection

@section('content')

<a href="{{route('staff.indexmhs')}}" class="btn mahasiswa btn-success mb-3">Daftar Mahasiswa</a>
<a href="{{route('staff.indexdsn')}}" class="btn mahasiswa btn-success mb-3">Daftar Dosen</a>
<a href="{{route('staff.indexstaff')}}" class="btn mahasiswa btn-success mb-3">Daftar Staff</a>
<br>
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
                @foreach ($mbkm as $km )
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $km->mahasiswa->nim }}</td>
                        <td class="text-center">{{ $km->mahasiswa->nama }}</td>
                        <td class="text-center">{{ $km->periode_mbkm }}</td>
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
                        @if ($km->status == 'Konversi diterima')
                            <form action="/staff/approve/{{$km->id}}" method="POST">
                            @csrf
                            <a href="{{ route('mahasiswa.detail', $km->id) }}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                            <a href="{{ route('pdf') }}" target="_blank" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Print Surat Konversi"><i class="fas fa-print"></i></a>
                            <button type="submit" class="badge btn btn-info p-1 mb-1"><i class="fas fa-check"></i></button>
                            </form>
                        @else
                            <a href="{{ route('mahasiswa.detail', $km->id) }}" class="badge btn btn-info p-1 mb-1" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fas fa-info-circle"></i></a>
                        @endif
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

