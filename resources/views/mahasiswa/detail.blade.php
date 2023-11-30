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
  <a href="{{ route('mahasiswa.index') }}" class="badge bg-success p-2 mb-3 "> Kembali <a>
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
                        <p class="card-title text-secondary text-sm " >Periode</p>
                        <p class="card-text text-start" >{{ $km->periode_mbkm }}</p>


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
                        <p class="card-title text-secondary text-sm" >Rincian Kegiatan</p><br>
                        <button  onclick="newTab1();" formtarget="_blank" target="_blank"class="badge bg-dark px-3 p-1">Buka</button>
                        <br><br>
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
                <button  onclick="newTab2();" formtarget="_blank" target="_blank"class="badge bg-dark px-3 p-1">Buka</button>
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
                        </tbody>
                     @endforeach


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
        @if (Str::length(Auth::guard('dosen')->user()) > 0)
        @if (Auth::guard('dosen')->user()->role_id == 6 || Auth::guard('dosen')->user()->role_id == 7 || Auth::guard('dosen')->user()->role_id == 8 )

            <div class="mb-5 mt-3 float-right">
                <div class="row row-cols-2">
                    <div class="col">
                        <button onclick="tolakUsulanmbkmKaprodi()"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
                    </div>
                    <div class="col">
                        <form action="/prodi/approve/{{$km->id}}" class="setujui-usulankp-kaprodi" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-success badge p-2 px-3 mb-3">Setujui</i></button>
                        </form>
                    </div>
                </div>
        @endif
        @endif

    @elseif($km->status == 'Usulan konversi nilai')
                @if (Str::length(Auth::guard('dosen')->user()) > 0)
        @if (Auth::guard('dosen')->user()->role_id == 6 || Auth::guard('dosen')->user()->role_id == 7 || Auth::guard('dosen')->user()->role_id == 8 )

            <div class="mb-5 mt-3 float-right">
                <div class="row row-cols-2">
                    <div class="col">
                        <button onclick="tolakUsulankonversiKaprodi()"  class="btn btn-danger badge p-2 px-3" data-bs-toggle="tooltip" title="Tolak" >Tolak</button>
                    </div>
                    <div class="col">
                        <form action="/prodi/approvekonversi/{{$km->id}}" class="setujui-usulankp-kaprodi" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-success badge p-2 px-3 mb-3">Setujui</i></button>
                        </form>
                    </div>
                </div>
        @endif
        @endif

    @endif
@endforeach
@foreach ($sertifikat as $sert )


<script>
    function newTab1(url){
        var x = window.open('{{asset('storage/file/' .$km->rincian )}}','_blank');
        x.focus();
    }
    function newTab2(url){
        var x = window.open('{{asset('storage/sertifikat/' .$sert->file )}}','_blank');
        x.focus();
    }

</script>
@endforeach
@endsection

@push('scripts')
@foreach ($mbkm as $km)
<script>

function tolakUsulanmbkmKaprodi() {
     Swal.fire({
            title: 'Tolak Usulan MBKM',
            text: 'Apakah Anda Yakin?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Tolak',
            confirmButtonColor: '#dc3545'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Tolak Usulan MBKM',
                    html: `
                        <form id="reasonForm" action="/prodi/tolakusulan/{{ $km->id }}" method="POST">
                        @method('put')
                            @csrf
                            <label for="catatan">Alasan Penolakan :</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="4" cols="50" required></textarea>
                            <br>
                            <button type="submit" class="btn btn-danger p-2 px-3">Kirim</button>
                            <button type="button" onclick="Swal.close();" class="btn btn-secondary p-2 px-3">Batal</button>
                        </form>
                    `,
                    showCancelButton: false,
                    showConfirmButton: false,
                });
            }
        });
    }
function tolakUsulankonversiKaprodi() {
     Swal.fire({
            title: 'Tolak Konversi MBKM',
            text: 'Apakah Anda Yakin?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Tolak',
            confirmButtonColor: '#dc3545'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Tolak Usulan MBKM',
                    html: `
                        <form id="reasonForm" action="/prodi/tolakkonversi/{{ $km->id }}" method="POST">
                        @method('put')
                            @csrf
                            <label for="catatan">Alasan Penolakan :</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="4" cols="50" required></textarea>
                            <br>
                            <button type="submit" class="btn btn-danger p-2 px-3">Kirim</button>
                            <button type="button" onclick="Swal.close();" class="btn btn-secondary p-2 px-3">Batal</button>
                        </form>
                    `,
                    showCancelButton: false,
                    showConfirmButton: false,
                });
            }
        });
    }
</script>
@endforeach
@endpush()
