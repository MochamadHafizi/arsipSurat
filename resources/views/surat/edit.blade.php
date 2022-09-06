@extends('layouts.index')
@section('container')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <p>Edit Surat yang telah terbit pada form ini untuk diarsipkan</p>
    <p>Catatan: </p>
    <ul>
        <li>Gunakan file berformat pdf</li>
    </ul>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data"  style="margin-top: 20px;">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Nomor Surat:</label>
                    <input type="text" name="nomor_surat" class="form-control" value="{{ $surat->nomor_surat }}" placeholder="nomor surat"><br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                   <select id="kategori" name="kategori">
                    <option value="Undangan">Undangan</option>
                    <option value="Pengumuman">Pengumuman</option>
                    <option value="Nota Dinas">Nota Dinas</option>
                    <option value="Pemberitahuan">Pemberitahuan</option>
                    </select>
                </div>
                <br>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Judul:</label>
                    <input type="text" name="judul" class="form-control" placeholder="judul" value="{{ $surat->judul }}"><br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="image" class="form-control" placeholder="image"><br>
                    <img src="/images/{{ $surat->image }}" width="100px">
                </div><br>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection