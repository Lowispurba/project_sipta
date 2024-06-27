@extends('layout.template')

@section('main')
<div>
    <h1>Create Dokumen</h1>
    <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_tugasakhir">Tugas Akhir</label>
            <select name="id_tugasakhir" id="id_tugasakhir" class="form-control" required>
                @foreach($tugasAkhirs as $tugasAkhir)
                    <option value="{{ $tugasAkhir->id }}">{{ $tugasAkhir->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="file">Upload Dokumen</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
