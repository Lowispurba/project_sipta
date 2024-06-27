@extends('layout.template')

@section('main')
<div class="row">
  <div class="col">
    <h1 class="mb-4">Data Tugas Akhir</h1>
  </div>
  <div class="col-auto">
    <a href="{{ route('tugas_akhirs.create') }}" class="btn btn-primary">Tambah Tugas Akhir</a>
  </div>
</div>
<div class="row mb-3">
    <div class="col-md-12 d-flex justify-content-between align-items-center">
      <div>
        <label>
          Show
          <select name="entries" id="entries" class="form-select form-select-sm d-inline-block" style="width: auto; display: inline;">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
          entries
        </label>
        </div>
        <div id="datatable_info" class="mr-3"></div>
        <div>
            <label>
                Search:
                <input type="search" id="search" class="form-control form-control-sm d-inline-block" placeholder="" style="width: auto; display: inline;">
            </label>
        </div>
    </div>
  </div>
<table class="table table-bordered">
  <thead class="table-primary">
    <tr>
      <th>No</th>
      <th>ID</th>
      <th>Judul</th>
      <th>Nama Mahasiswa</th>
      <th>Dosen Pembimbing</th>
      <th>Tanggal</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @if($tugas_akhirs->count() > 0)
      @foreach ($tugas_akhirs as $tugas_akhir)
        <tr>
          <td class="align-middle">{{ $loop->iteration }}</td>
          <td class="align-middle">{{ $tugas_akhir->id }}</td>
          <td class="align-middle">{{ $tugas_akhir->judul }}</td>
          <td class="align-middle">{{ $tugas_akhir->id_mahasiswa}}</td>
          <td class="align-middle">{{ $tugas_akhir->dosen_pembimbing}}</td>
          <td class="align-middle">{{ $tugas_akhir->tanggal }}</td>
          <td class="align-middle">{{ $tugas_akhir->status }}</td>
          <td class="align-middle">
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ route('tugas_akhirs.show', $tugas_akhir) }}" class="btn btn-info">Detail</a>
              <a href="{{ route('tugas_akhirs.edit', $tugas_akhir) }}" class="btn btn-warning">Edit</a>
              <form action="{{ route('tugas_akhirs.destroy', $tugas_akhir->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    @else
      <tr>
        <td class="align-middle text-center" colspan="8">Tugas Akhir tidak ditemukan</td>
      </tr>
    @endif
  </tbody>
</table>
@endsection
