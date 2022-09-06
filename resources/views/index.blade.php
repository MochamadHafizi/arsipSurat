@extends('layouts.index')
@section('container')
    <h1 class="mt-5 mb-5">Arsip Surat</h1>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan</p>
    <p class="mb-5">Klik "Lihat" pada kolom aksi untuk menampilkan surat</p>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="{{ url('/surat/search') }}" method="get" accept-charset="utf-8">
                <div class="form-search" style="float: right">
                    <div class="form-group" style="display:flex">
                        <input type="text" name="search_name" class="form-control" placeholder="cari..">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
             </form>
        </div>
    </div>
    <br><br><br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            <table class="table table-striped table-hover table-responsive-md">
        <thead class="table-dark">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nomor Surat</th>
            <th scope="col">Kategori</th>
            <th scope="col">Judul</th>
            <th scope="col">Gambar</th>
            <th scope="col">Waktu Pengarsipan</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        @foreach ($surat as $value)
        <tbody>
            <tr>
            <th scope="row">{{ ++$i }}</th>
            <td>{{ $value->nomor_surat }}</td>
            <td>{{ $value->kategori }}</td>
            <td>{{ $value->judul }}</td>
            <td><img src="/images/{{ $value->image }}" width="100px"></td>
            <td>{{ $value->created_at }}</td>
            <td>
               <form action="{{ route('surat.destroy', $value->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('surat.show', $value->id) }}">Lihat</a>

                        <a class="btn btn-success" href="{{ route('surat.edit', $value->id) }}">Edit</a>

                        <a class="btn btn-warning" href="">Unduh</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger show-alert-delete-box" data-toggle="tooltip" title='Delete'>Delete</button>
                    </form>
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
        <a href="{{ route('surat.create') }}" class="btn btn-info">Arsipkan Surat</a>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Apakah anda yakin ingin menghapus arsip surat ini?",
            text: "Jika Menghapus Data Akan Hilang Permanen.",
            icon: "warning",
            type: "warning",
            buttons: ["Batal","Ya!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@endsection