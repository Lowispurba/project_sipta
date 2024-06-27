@extends('layout.template')

@section('main')
<h1>Edit Tugas Akhir</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tugas_akhirs.update', $tugasAkhir->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" class="form-control" value="{{ $tugasAkhir->judul }}">
    </div>

    <div class="form-group">
        <label for="id_mahasiswa">Mahasiswa:</label>
        <select name="id_mahasiswa" id="id_mahasiswa" class="form-control">
            @foreach ($mahasiswas as $mahasiswa)
                <option value="{{ $mahasiswa->nama }}" {{ optional($tugasAkhir->mahasiswa)->nama == $mahasiswa->nama ? 'selected' : '' }}>
                    {{ $mahasiswa->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="dosen_pembimbing">Dosen Pembimbing:</label>
        <select name="dosen_pembimbing" id="dosen_pembimbing" class="form-control">
            @foreach ($dosens as $dosen)
                <option value="{{ $dosen->nama }}" {{ optional($tugasAkhir->dosen)->nama == $dosen->nama ? 'selected' : '' }}>
                    {{ $dosen->nama }}
                </option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $tugasAkhir->tanggal }}">
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" id="status" class="form-control">
            <option value="Menunggu" @if ($tugasAkhir->status == 'Menunggu') selected @endif>Menunggu</option>
            <option value="Disetujui" @if ($tugasAkhir->status == 'Disetujui') selected @endif>Disetujui</option>
            <option value="Ditolak" @if ($tugasAkhir->status == 'Ditolak') selected @endif>Ditolak</option>
            <option value="Selesai" @if ($tugasAkhir->status == 'Selesai') selected @endif>Selesai</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
