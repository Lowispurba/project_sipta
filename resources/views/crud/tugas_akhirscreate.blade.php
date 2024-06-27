@extends('layout.template')

@section('main')
<h1>Tambah Tugas Akhir</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tugas_akhirs.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}">
    </div>

    <div class="form-group">
        <label for="id_mahasiswa">Mahasiswa:</label>
        <select name="id_mahasiswa" id="id_mahasiswa" class="form-control">
            @foreach ($mahasiswas as $mahasiswa)
                <option value="{{ $mahasiswa->nama }}">{{ $mahasiswa->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="dosen_pembimbing">Dosen Pembimbing:</label>
        <select name="dosen_pembimbing" id="dosen_pembimbing" class="form-control">
            @foreach ($dosens as $dosen)
                <option value="{{ $dosen->nama }}">{{ $dosen->nama }}</option>
            @endforeach
        </select>
    </div>

    {{-- <div class="form-group">
        <label for="tanggal">Tanggal Pengajuan:</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}">
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" id="status" class="form-control">
            <option value="Menunggu">Menunggu</option>
            <option value="Disetujui">Disetujui</option>
            <option value="Ditolak">Ditolak</option>
            <option value="Selesai">Selesai</option>
        </select>
    </div> --}}
    <div class="form-group">
        <label for="file">Upload Dokumen</label>
        <input type="file" name="file" id="file" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
