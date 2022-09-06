@extends('layouts.index')
@section('container')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Lihat</li>
  </ol>
</nav>

<h3>Nomor : {{ $surat->nomor_surat }}</h3>
<h3>Kategori : {{ $surat->kategori }}</h3>
<h3>Judul : {{ $surat->judul }}</h3>
<h3>Waktu Unggah : {{ $surat->created_at }}</h3>
<img src="/images/{{ $surat->image }}" width="50%"><br><br><br>
<a href="{{ route('surat.index') }}" class="btn btn-primary me-3">Back</a>
<a href="" class="btn btn-warning">Unduh</a><br><br>
@endsection