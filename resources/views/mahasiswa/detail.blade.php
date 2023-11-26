@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    SITEI MBKM | Detail Mahasiswa
@endsection

@section('sub-title')
    Detail Mahasiswa
@endsection
<style>

</style>
@section('content')

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
</div>
@endif


@if (Str::length(Auth::guard('dosen')->user()) > 0)
<div class="container-fluid">
  <a href="{{ route('prodi.index') }}" class="badge bg-success p-2 mb-3 "> Kembali <a>
    </div>

@elseif (Str::length(Auth::guard('web')->user()) > 0)
<div class="container-fluid">
  <a href="{{ route('staff.index') }}" class="badge bg-success p-2 mb-3 "> Kembali <a>
    </div>

@elseif (Str::length(Auth::guard('mahasiswa')->user()) > 0)
<div class="container-fluid">
  <a href="{{ route('revisi.index') }}" class="badge bg-success p-2 mb-3 "> Kembali <a>
    </div>

@endif
@foreach ($mbkm as $km)


  <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-bold">Mahasiswa</h5>
                    <hr>
                        <p class="card-title text-secondary text-sm " >Nama</p>
                        <p class="card-text text-start" >{{ $km->mahasiswa->nama }}</p>
                        <p class="card-title text-secondary text-sm " >NIM</p>
                        <p class="card-text text-start" >{{ $km->mahasiswa->nim }}</p>
                        <p class="card-title text-secondary text-sm " >Program Studi</p>
                        <p class="card-text text-start" >{{ $km->mahasiswa->prodi->nama_prodi }}</p>
                        <p class="card-title text-secondary text-sm " >Email</p>
                        <p class="card-text text-start" >{{ $km->mahasiswa->email }}</p>
                        <p class="card-title text-secondary text-sm " >Konsentrasi</p>
                        <p class="card-text text-start" >{{ $km->mahasiswa->konsentrasi->nama_konsentrasi }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-bold">Data Lokasi MBKM</h5>
                    <hr>
                        <p class="card-title text-secondary text-sm" >Nama Perusahaan</p>
                        <p class="card-text text-start" >{{ $km->perusahaan }}</p>
                        <p class="card-title text-secondary text-sm" >Alamat Perusahaan</p>
                        <p class="card-text text-start"> {{ $km->alamat }}</p>
                        <p class="card-title text-secondary text-sm" >Bidang Usaha/Kegiatan</p>
                        <p class="card-text text-start" >{{ $km->bidang_usaha }}</p>
                        {{-- <p class="card-title text-secondary text-sm " >KRS Semester Berjalan</p> --}}
                        {{-- <p class="card-text text-start " ><button  onclick="#" formtarget="_blank" target="_blank"class="badge bg-dark px-3 p-1">Buka</button></p>
                        <p class="card-title text-secondary text-sm " >Transkip Nilai</p>
                        <p class="card-text text-start " ><button  onclick="#" formtarget="_blank" target="_blank"class="badge bg-dark px-3 p-1">Buka</button></p> --}}
                        <p class="card-title text-secondary text-sm" >Periode Kegiatan</p>
                        <p class="card-text text-start "> {{ $km->priode_kegiatan }}</p>
                        <p class="card-title text-secondary text-sm" >Judul</p>
                        <p class="card-text text-start ">{{ $km->judul }}</p>

                    </div>
                </div>
            </div>
    </div>
@endforeach

    <div class="card">
      <div class="card-body">
        <h5 class="text-bold">Sertifikat dan Konversi Nilai</h5>
                <hr>
                <p class="card-title text-secondary text-sm" >Sertifikat</p><br>
                <button  onclick="newTab1();" formtarget="_blank" target="_blank"class="badge bg-dark px-3 p-1">Buka</button>
                <br><br>
                {{-- <p class="card-text text-start " >Belum Upload</p> --}}
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
        {{-- <div class="float-right">
            <div class="row">
                <div class="col">
                 <button onclick="#"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
            </div>
                <div class="col">
                    <form action="#" class="setujui-usulankp-koordinator" method="POST">
                        @method('put')
                        @csrf
                        <button class="btn btn-success badge p-2 px-3 mb-3">Setujui</button>
                    </form>
                </div>
          </div>
        </div> --}}
        {{-- <p class="card-title text-secondary text-sm" >Status</p>
        <p class="card-text text-start" ><span class="badge p-2 bg-secondary text-bold pr-3 pl-3" style="border-radius:20px;"></span></p>
        <p class="card-title text-secondary text-sm" >Keterangan</p>
        <p class="card-text text-start" ><span></span></p> --}}
      </div>
    </div>
@foreach ($mbkm as $km)

    @if ($km->status == 'Usulan')
        <div class="mb-5 mt-3 float-right">
            <div class="row row-cols-2">
                <div class="col">
                    <form action="/prodi/tolakusulan/{{ $km->id }}" method="POST">
                        @csrf
                        <button onclick="#"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
                    </form>
            </div>
                <div class="col">
                    <form action="/prodi/approve/{{ $km->id }}" class="setujui-usulankp-koordinator" method="POST">
                        @csrf
                        <button class="btn btn-success badge p-2 px-3 mb-3" type="submit">Setujui</button>
                    </form>
                </div>
        </div>
    @elseif($km->status == 'Usulan konversi nilai')
        <div class="mb-5 mt-3 float-right">
            <div class="row row-cols-2">
                <div class="col">
                    <form action="/prodi/tolakkonversi/{{ $km->id }}" method="POST">
                        @csrf
                        <button onclick="#"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
                    </form>
            </div>
                <div class="col">
                    <form action="/prodi/approvekonversi/{{ $km->id }}" class="setujui-usulankp-koordinator" method="POST">
                        @csrf
                        <button class="btn btn-success badge p-2 px-3 mb-3" type="submit">Setujui</button>
                    </form>
                </div>
        </div>
    @else
    <div class="mb-5 mt-3 float-right">
        <div class="row row-cols-2">
            <div class="col">
        </div>
        <div class="col">
        </div>
    </div>
    @endif
@endforeach
</div>
{{-- <script>
    function newTab1(url){
        var x = window.open('{{asset('storage/file' .$km->sertifikat )}}','_blank');
        x.focus();
    }
</script> --}}

@endsection
