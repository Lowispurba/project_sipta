@extends('layout.template')

@section('main')
<div class="row">
  <div class="col">
    <h1 class="mb-4">Data Mahasiswa</h1>
  </div>
  <div class="col-auto">
    <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
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
      <th>NIM</th>
      <th>Nama</th>
      <th>Prodi</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @if($mahasiswas->count() > 0)
      @foreach ($mahasiswas as $mahasiswa)
        <tr>
          <td class="align-middle">{{ $loop->iteration }}</td>
          <td class="align-middle">{{ $mahasiswa->nim }}</td>
          <td class="align-middle">{{ $mahasiswa->nama }}</td>
          <td class="align-middle">{{ $mahasiswa->prodi }}</td>
          <td class="align-middle">
            @if($mahasiswa->foto)
              <img src="{{ asset('storage/uploads/' . $mahasiswa->foto) }}" alt="{{ $mahasiswa->nama }}" width="50">
            @else
              Tidak Ada Foto
            @endif
          </td>
          <td class="align-middle">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('mahasiswa.show', $mahasiswa) }}" class="btn btn-info">Detail</a>
              <a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}" class="btn btn-warning">Edit</a>
              <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
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
        <td class="align-middle text-center" colspan="6">Mahasiswa tidak ditemukan</td>
      </tr>
    @endif
  </tbody>
</table>
@endsection
