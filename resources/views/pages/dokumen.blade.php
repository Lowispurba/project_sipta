@extends('layout.template')

@section('main')
<div class="row">
  <div class="col">
    <h1 class="mb-4">Data Dokumen</h1>
  </div>
  <div class="col-auto">
    <a href="{{ route('dokumen.create') }}" class="btn btn-primary">Unggah Dokumen Baru</a>
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
      <th>Judul Tugas Akhir</th>
      <th>Nama Dokumen</th>
      <th>Lokasi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @if($dokumens->count() > 0)
      @foreach ($dokumens as $dokumen)
        <tr>
          <td class="align-middle">{{ $loop->iteration }}</td>
          <td class="align-middle">{{ $dokumen->tugasAkhir->judul ?? 'N/A' }}</td>
          <td class="align-middle">{{ $dokumen->nama }}</td>
          <td class="align-middle">{{ $dokumen->lokasi }}</td>
          <td class="align-middle">
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ route('dokumen.show', $dokumen->id) }}" class="btn btn-info">Detail</a>
              <a href="{{ route('dokumen.edit', $dokumen->id) }}" class="btn btn-warning">Edit</a>
              <form action="{{ route('dokumen.destroy', $dokumen->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
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
        <td class="align-middle text-center" colspan="5">Dokumen tidak ditemukan</td>
      </tr>
    @endif
  </tbody>
</table>
<div>
    @if ($dokumens->onFirstPage())
        <span class="btn btn-secondary disabled">Previous</span>
    @else
        <a href="{{ $dokumens->previousPageUrl() }}" class="btn btn-primary">Previous</a>
    @endif

    @if ($dokumens->hasMorePages())
        <a href="{{ $dokumens->nextPageUrl() }}" class="btn btn-primary">Next</a>
    @else
        <span class="btn btn-secondary disabled">Next</span>
    @endif
  </div>
@endsection
