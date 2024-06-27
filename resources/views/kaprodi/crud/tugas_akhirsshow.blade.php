@extends('layout.template')

@section('main')
<h1>Detail Tugas Akhir</h1>

<div class="table-responsive">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Judul</th>
                <td>{{ $tugasAkhir->judul }}</td>
            </tr>
            <tr>
                <th>ID Mahasiswa</th>
                <td>{{ $tugasAkhir->id_mahasiswa }}</td>
            </tr>
            <tr>
                <th>Dosen Pembimbing</th>
                <td>{{ optional($tugasAkhir->dosen)->nama }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $tugasAkhir->tanggal }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $tugasAkhir->status }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
