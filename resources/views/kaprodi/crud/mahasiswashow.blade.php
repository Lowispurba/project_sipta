@extends('layout.template')

@section('main')
<h1>Detail Mahasiswa</h1>
<hr>
<div class="table-responsive">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th>NIM</th>
        <td>{{ $mahasiswa->nim }}</td>
      </tr>
      <tr>
        <th>Nama Mahasiswa</th>
        <td>{{ $mahasiswa->nama }}</td>
      </tr>
      <tr>
        <th>Prodi</th>
        <td>{{ $mahasiswa->prodi }}</td>
      </tr>
      <tr>
        <th>IPK</th>
        <td>{{ $mahasiswa->ipk }}</td>
      </tr>
      @if ($mahasiswa->foto)
      <tr>
        <th>Foto</th>
        <td>
          <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="{{ $mahasiswa->nama }}" width="150">
        </td>
      </tr>
      @endif
    </tbody>
  </table>
</div>

@endsection
