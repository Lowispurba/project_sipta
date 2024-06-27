@extends('layout.template')

@section('main')
<h1>Detail Dosen</h1>
<hr>
<div class="table-responsive">
  <table class="table table-bordered">
    <tbody>
    @if ($dosen->foto)
        <tr>
            <th>Foto</th>
            <td>
                <img src="{{ asset('storage/uploads/' . $dosen->foto) }}" alt="{{ $dosen->nama }}" width="100">
            </td>
        </tr>
    @endif
      <tr>
        <th>ID Dosen</th>
        <td>{{ $dosen->id }}</td>
      </tr>
      <tr>
        <th>Nama Dosen</th>
        <td>{{ $dosen->nama }}</td>
      </tr>
      <tr>
        <th>NIP</th>
        <td>{{ $dosen->nip }}</td>
      </tr>
      <tr>
        <th>Nomor Telepon</th>
        <td>{{ $dosen->no_telp }}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{ $dosen->email }}</td>
      </tr>
    </tbody>
  </table>
  <a href="{{ route('dosen.index') }}" class="btn btn-primary">Kembali</a>
</div>


@endsection
