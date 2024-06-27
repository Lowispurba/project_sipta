@extends('layout.template')

@section('main')
<div class="container">
  <h1>Buat Penilaian Baru</h1>

  <form action="{{ route('penilaian.store') }}" method="POST">
    @csrf

    <div class="form-group">
      <label for="id_tugasakhir">ID Tugas Akhir:</label>
      <select name="id_tugasakhir" id="id_tugasakhir" class="form-control">
        @foreach ($tugasAkhir as $ta)
          <option value="{{ $ta->id }}">{{ $ta->judul }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="dosen_penguji">Dosen Penguji:</label>
      <select name="dosen_penguji" id="dosen_penguji" class="form-control">
        @foreach ($dosen as $d)
          <option value="{{ $d->id }}">{{ $d->nama }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="nilai">Nilai:</label>
      <input type="number" name="nilai" id="nilai" class="form-control" min="0" max="100">
    </div>

    <div class="form-group">
      <label for="komentar">Komentar:</label>
      <textarea name="komentar" id="komentar" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection
