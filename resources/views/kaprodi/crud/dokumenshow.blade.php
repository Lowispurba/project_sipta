@extends('layout.template')

@section('main')
<div class="container">
    <h1>Detail Dokumen</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Detail Dokumen
        </div>
        <div class="card-body">
            <h5 class="card-title">Nama: {{ $dokumen->nama }}</h5>
            <p class="card-text">Lokasi: {{ $dokumen->lokasi }}</p>
            <p class="card-text">Tugas Akhir: {{ $dokumen->tugasAkhir->judul }}</p>
            <p class="card-text">File: <a href="{{ asset('views/crud/dokumenshow' . $dokumen->lokasi) }}" target="_blank">Download</a></p>
            <a href="{{ route('dokumen.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
