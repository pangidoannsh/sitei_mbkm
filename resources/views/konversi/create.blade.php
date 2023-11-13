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

</div>
</form>

@endsection

