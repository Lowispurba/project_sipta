@extends('layout.template')

@section('main')
<div class="container">
  <h1>Edit Penilaian</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('penilaian.update', $penilaian->id) }}" method="POST">
    @csrf
    @method('PUT')  <div class="form-group">
      <label for="id_tugasakhir">ID Tugas Akhir:</label>
      <select name="id_tugasakhir" id="id_tugasakhir" class="form-control">
        @foreach ($tugasAkhir as $ta)
          <option value="{{ $ta->id }}" {{ $ta->id == $penilaian->id_tugasakhir ? 'selected' : '' }}>{{ $ta->judul }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="dosen_penguji">Dosen Penguji:</label>
      <select name="dosen_penguji" id="dosen_penguji" class="form-control">
        @foreach ($dosen as $d)
          <option value="{{ $d->id }}" {{ $d->id == $penilaian->dosen_penguji ? 'selected' : '' }}>{{ $d->nama }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="nilai">Nilai:</label>
      <input type="number" name="nilai" id="nilai" class="form-control" min="0" max="100" value="{{ $penilaian->nilai }}">
    </div>

    <div class="form-group">
      <label for="komentar">Komentar:</label>
      <textarea name="komentar" id="komentar" class="form-control" rows="3">{{ $penilaian->komentar }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </form>
</div>
@endsection
