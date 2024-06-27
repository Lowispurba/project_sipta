@extends('layout.template')

@section('main')
<div>
    <h1>Edit Dokumen</h1>
    <form action="{{ route('dokumen.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_tugasakhir">Tugas Akhir</label>
            <select name="id_tugasakhir" id="id_tugasakhir" class="form-control" required>
                @foreach($tugasAkhirs as $tugasAkhir)
                    <option value="{{ $tugasAkhir->id }}" {{ $tugasAkhir->id == $dokumen->id_tugasakhir ? 'selected' : '' }}>{{ $tugasAkhir->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $dokumen->nama }}" required>
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ $dokumen->lokasi }}" required>
        </div>
        <div class="form-group">
            <label for="file">Upload Dokumen Baru (opsional)</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
