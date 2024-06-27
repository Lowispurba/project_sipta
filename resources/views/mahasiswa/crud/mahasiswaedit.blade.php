@extends('layout.template')

@section('main')
<div class="container">
  <h1>Edit Data Mahasiswa</h1>

  <form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="nim">NIM:</label>
      <input type="text" name="nim" class="form-control" id="nim" value="{{ $mahasiswa->nim }}" readonly>
    </div>

    <div class="form-group">
      <label for="nama">Nama Mahasiswa:</label>
      <input type="text" name="nama" class="form-control" id="nama" value="{{ $mahasiswa->nama }}">
    </div>

    <div class="form-group">
      <label for="prodi">Prodi:</label>
      <input type="text" name="prodi" class="form-control" id="prodi" value="{{ $mahasiswa->prodi }}">
    </div>

    <div class="form-group">
      <label for="ipk">IPK:</label>
      <input type="number" step="0.01" name="ipk" class="form-control" id="ipk" value="{{ $mahasiswa->ipk }}">
    </div>

    <div class="form-group">
      <label for="foto">Foto (Optional):</label>
      <input type="file" name="foto" class="form-control" id="foto">
      <small class="text-muted">Leave blank to keep existing foto.</small>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
