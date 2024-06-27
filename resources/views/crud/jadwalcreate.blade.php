@extends('layout.template')

@section('main')
<div>
  <h1>Buat Jadwal Baru</h1>

  <form action="{{ route('jadwal.store') }}" method="POST">
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
      <label for="id_ruang">ID Ruang:</label>
      <select name="id_ruang" id="id_ruang" class="form-control">
        @foreach ($ruang as $r)
          <option value="{{ $r->id }}">{{ $r->nama }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="tanggal">Tanggal:</label>
      <input type="date" name="tanggal" id="tanggal" class="form-control">
    </div>

    <div class="form-group">
      <label for="waktu">Waktu:</label>
      <input type="time" name="waktu" id="waktu" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection
