@extends('layout.template')

@section('main')
<div class="row">
  <div class="col">
    <h1 class="mb-4">Data Ruangan</h1>
  </div>
  <div class="col-auto">
    <a href="{{ route('ruangan.create') }}" class="btn btn-primary">Tambah Ruangan</a>
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
      <th>Nama Ruangan</th>
      <th>Kapasitas</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @if($ruangan->count() > 0)
      @foreach ($ruangan as $ruangan)
        <tr>
          <td class="align-middle">{{ $loop->iteration }}</td>
          <td class="align-middle">{{ $ruangan->id }}</td>
          <td class="align-middle">{{ $ruangan->nama }}</td>
          <td class="align-middle">{{ $ruangan->kapasitas }}</td>
          <td class="align-middle">{{ $ruangan->status }}</td>
          <td class="align-middle">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('ruangan.show', $ruangan) }}" class="btn btn-info">Detail</a>
                <a href="{{ route('ruangan.edit', $ruangan->id) }}" class="btn btn-warning">Edit</a>
              <form action="{{ route('ruangan.destroy', $ruangan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
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
        <td class="align-middle text-center" colspan="6">Ruangan tidak ditemukan</td>
      </tr>
    @endif
  </tbody>
</table>
@endsection
