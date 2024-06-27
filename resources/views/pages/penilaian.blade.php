@extends('layout.template')

@section('main')
<div class="row">
  <div class="col">
    <h1 class="mb-4">Data Penilaian Tugas Akhir</h1>
  </div>
  <div class="col-auto">
    <a href="{{ route('penilaian.create') }}" class="btn btn-primary">Buat Penilaian Baru</a>
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
      <th>Dosen Penguji</th>
      <th>Nilai</th>
      <th>Komentar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @if($penilaians->count() > 0)
      @foreach ($penilaians as $penilaian)
        <tr>
          <td class="align-middle">{{ $loop->iteration }}</td>
          <td class="align-middle">{{ $penilaian->tugasAkhir->judul ?? 'N/A' }}</td>  <td class="align-middle">{{ $penilaian->dosenPenguji->nama ?? 'N/A' }}</td>  <td class="align-middle">{{ $penilaian->nilai }}</td>
          <td class="align-middle">{{ Str::limit($penilaian->komentar, 50) }}</td> <td class="align-middle">
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ route('penilaian.show', $penilaian->id) }}" class="btn btn-info">Detail</a>
              <a href="{{ route('penilaian.edit', $penilaian->id) }}" class="btn btn-warning">Edit</a>
              <form action="{{ route('penilaian.destroy', $penilaian->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus penilaian?')">
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
        <td class="align-middle text-center" colspan="6">Penilaian tidak ditemukan</td>
      </tr>
    @endif
  </tbody>
</table>
@endsection
