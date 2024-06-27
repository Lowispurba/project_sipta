@extends('layout.template')

@section('main')
  <div>
    <h1>Edit Mahasiswa</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')  <div class="form-group">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" class="form-control" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" placeholder="Masukkan NIM">
      </div>

      <div class="form-group">
        <label for="nama">Nama Mahasiswa:</label>
        <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $mahasiswa->nama) }}" placeholder="Masukkan Nama Mahasiswa">
      </div>

      <div class="form-group">
        <label for="prodi">Prodi:</label>
        <select name="prodi" id="prodi" class="form-control">
          <option value="">Pilih Prodi</option>
          <option value="TK" {{ $mahasiswa->prodi === 'TK' ? 'selected' : '' }}>TK</option>
          <option value="TRPL" {{ $mahasiswa->prodi === 'TRPL' ? 'selected' : '' }}>TRPL</option>
          <option value="MI" {{ $mahasiswa->prodi === 'MI' ? 'selected' : '' }}>MI</option>
          <option value="ANIMASI" {{ $mahasiswa->prodi === 'ANIMASI' ? 'selected' : '' }}>ANIMASI</option>
        </select>
      </div>

      <div class="form-group">
        <label for="foto">Foto (Optional):</label>
        <input type="file" name="foto" class="form-control" id="foto">
        @if($mahasiswa->foto)
          <img src="{{ asset('uploads/' . $mahasiswa->foto) }}" alt="{{ $mahasiswa->nama }}" width="100px">
        @endif
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
@endsection
