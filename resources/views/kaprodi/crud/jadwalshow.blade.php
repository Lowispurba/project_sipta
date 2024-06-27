@extends('layout.template')

@section('main')
<div class="container">
  <h1>Detail Jadwal</h1>
  <hr>
  <div class="row-justify-content-center">
    <div">
    <h3>Data Jadwal</h3>
    <hr>
      <ul class="list-group">
        <li class="list-group-item">ID Jadwal: {{ $data->id }}</li>
        <li class="list-group-item">ID Tugas Akhir: {{ $data->id_tugasakhir }}</li>
        <li class="list-group-item">ID Ruang: {{ $data->id_ruang }}</li>
        <li class="list-group-item">Tanggal: {{ $data->tanggal }}</li>
        <li class="list-group-item">Waktu: {{ $data->waktu }}</li>
      </ul>
    </div>

    @if($tugasAkhir)
      <div class="col-auto">
        <h3>Data Tugas Akhir</h3>
        <hr>
        <ul class="list-group">
          <li class="list-group-item">Nama: {{ $tugasAkhir->judul }}</li>
          <li class="list-group-item">Mahasiswa: {{ $tugasAkhir->id_mahasiswa }}</li>
          <li class="list-group-item">Dosen Pembimbing: {{ $tugasAkhir->dosen_pembimbing}}</li>
          <li class="list-group-item">Status Sidang: {{ $tugasAkhir->status }}</li>
        </ul>
      </div>
    @endif

    @if($ruang)
      <div class="col-auto">
        <h3>Data Ruang</h3>
        <hr>
        <ul class="list-group">
          <li class="list-group-item">Nama: {{ $ruang->nama }}</li>
          <li class="list-group-item">Kapasitas: {{ $ruang->kapasitas }}</li>
          <li class="list-group-item">Status: {{ $ruang->status }}</li>
        </ul>
      </div>
    @endif
  </div>

  <a href="{{ route('jadwal.index') }}" class="btn btn-secondary mb-3">Kembali</a>
</div>
@endsection
