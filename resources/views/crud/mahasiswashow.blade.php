@extends('layout.template')

@section('main')
<h1>Detail Mahasiswa</h1>
<hr>
<table class="table table-bordered">
  <tbody>
    <tr>
        <th>Foto</th>
        <td>
            @if($mahasiswa->foto)
                <img src="{{ asset('storage/uploads/' . $mahasiswa->foto) }}" alt="{{ $mahasiswa->nama }}" width="100">
            @else
                Tidak ada foto
            @endif
        </td>
    </tr>
    <tr>
      <th>Nama</th>
      <td>{{ $mahasiswa->nama }}</td>
    </tr>
    <tr>
      <th>NIM</th>
      <td>{{ $mahasiswa->nim }}</td>
    </tr>
    <tr>
      <th>Prodi</th>
      <td>{{ $mahasiswa->prodi }}</td>
    </tr>
  </tbody>
</table>
<a href="{{ route('mahasiswas.index') }}" class="btn btn-primary">Kembali</a>
@endsection
