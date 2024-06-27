@extends('layout.template')

@section('main')
<div>
  <h1>Edit Jadwal</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('jadwal.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="id_tugasakhir">ID Tugas Akhir:</label>
      <select name="id_tugasakhir" id="id_tugasakhir" class="form-control">
        @foreach ($tugasAkhir as $ta)
          <option value="{{ $ta->id }}" @if($data->id_tugasakhir == $ta->id) selected @endif>{{ $ta->judul }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="id_ruang">ID Ruang:</label>
      <select name="id_ruang" id="id_ruang" class="form-control">
        @foreach ($ruang as $r)
          <option value="{{ $r->id }}" @if($data->id_ruang == $r->id) selected @endif>{{ $r->nama }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="tanggal">Tanggal:</label>
      <input type="date" name="tanggal" id="tanggal" value="{{ $data->tanggal }}" class="form-control">
    </div>

    <div class="form-group">
      <label for="waktu">Waktu:</label>
      <input type="time" name="waktu" id="waktu" value="{{ $data->waktu }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </form>
</div>
@endsection
