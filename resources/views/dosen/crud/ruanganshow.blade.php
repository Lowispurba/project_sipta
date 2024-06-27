@extends('layout.template')

@section('main')
<h1>Detail Ruangan</h1>

<div class="table-responsive">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th>ID Ruangan</th>
        <td>{{ $ruangan->id }}</td>
      </tr>
      <tr>
        <th>Nama Ruangan</th>
        <td>{{ $ruangan->nama }}</td>
      </tr>
      <tr>
        <th>Kapasitas</th>
        <td>{{ $ruangan->kapasitas }} orang</td>
      </tr>
      <tr>
        <th>Status</th>
        <td>{{ $ruangan->status }}</td>
      </tr>
    </tbody>
  </table>
</div>

@endsection
