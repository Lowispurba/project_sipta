@extends('layout.template')

@section('main')
    <div>
        <h1>Tambah Mahasiswa</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mahasiswas.store') }}" method="POST" enctype="multipart/form-data"> @csrf

            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM">
            </div>

            <div class="form-group">
                <label for="nama">Nama Mahasiswa:</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Mahasiswa">
            </div>

            <div class="form-group">
                <label for="prodi">Prodi:</label>
                <select name="prodi" id="prodi" class="form-control">
                    <option value="">Pilih Prodi</option>
                    <option value="TK">TK</option>
                    <option value="TRPL">TRPL</option>
                    <option value="MI">MI</option>
                    <option value="ANIMASI">ANIMASI</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto (Optional):</label>
                <input type="file" name="foto" class="form-control" id="foto">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
