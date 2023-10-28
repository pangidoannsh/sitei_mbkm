@extends('layouts.main')

@php
    Use Carbon\Carbon;
@endphp

@section('title')
    SITEI | Pendaftaran
@endsection


@section('sub-title')

@endsection
@section('content')

<div class="container px-md-5  " >

  <div class="row">
<div class="col-12 col-md-6 utama utama-skripsi">
 <a href="/usulan/create"><div class="card kpindex">
      <img  src="/assets/img/il8.png" class="rounded mx-auto d-block card-img-top shadow-lg p-3 bg-body rounded" alt="...">
  <div class="card-body">

    <div class="row">
    <div class="col-sm-5 col-md-6 "><h1><p class=" fs-3 text-bold text-dark" >MBKM</p></h1></a></div>
    <div  class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 mt-0"><p class="card-text text-md-end status" ><span class="float-end badge p-2 bg-secondary text-bold pr-3 pl-3" style="border-radius:20px;">BELUM DAFTAR</span></p></div>
  </div>
  <div class="row">
    <div class="col-sm-12 mt-3 mt-md-0 "><p class="card-title text-secondary text-sm" >Keterangan</p>
        <p class="card-text text-start text-dark" ><span>Belum melakukan Usul Kegiatan</span></p></div>
    </div>
        </div>
        </div>
    </div>
    </div>
</div>

    <br>
    <br>

@endsection
