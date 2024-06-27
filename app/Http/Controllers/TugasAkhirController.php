<?php

namespace App\Http\Controllers;
use App\Http\Controllers\mahasiswacontroller;
use App\Http\Controllers\DosenController;
use Illuminate\Http\Request;
use App\Models\TugasAkhir;
use App\Models\mahasiswa;
use App\Models\dosen;
class TugasAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugas_akhirs = TugasAkhir::with(['mahasiswa', 'dosen'])->get(); // Eager load relationships

        return view('pages.tugas_akhirs', compact('tugas_akhirs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswas = mahasiswa::all(); // Retrieve all mahasiswas
        $dosens = dosen::all(); // Retrieve all dosens
        return view('crud.tugas_akhirscreate', compact('mahasiswas', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'judul' => 'required|max:255',
        'id_mahasiswa' => 'nullable|string',
        /* 'dosen_pembimbing' => 'nullable|string',
        'tanggal' => 'required|date', */
        'file' => 'required|file|mimes:pdf,docx,xlsx|max:2048',
        /* 'status' => 'required|max:255', */
    ]);
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $dokumen = new Dokumen;
    $dokumen->id_tugasakhir = $request->id_tugasakhir;
    $dokumen->nama = $request->nama;
    $dokumen->lokasi = $request->lokasi;

    $fileName = time() . '.' . $request->file->getClientOriginalExtension();
    $request->file->storeAs('public/upload', $fileName);
    $dokumen->file = $fileName;

    $dokumen->save();
    // Buat entri tugas akhir baru
    $tugasAkhir = TugasAkhir::create($validatedData);

    return redirect()->route('tugas_akhirs.index')->with('success', 'Tugas Akhir berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(TugasAkhir $tugasAkhir)
    {
        $tugasAkhir = $tugasAkhir->load(['mahasiswa', 'dosen']); // Eager load relationships

        return view('crud.tugas_akhirsshow', compact('tugasAkhir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(TugasAkhir $tugasAkhir)
    {
        $dokumen = Dokumen::with('tugasAkhir')->find($id);
        $tugasAkhirs = TugasAkhir::all(); // Get all tugas akhir for dropdown

        if (!$dokumen) {
            return abort(404);
        }
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all(); // Fetch dosens if needed
        return view('crud.tugas_akhirsedit', compact('tugasAkhir', 'mahasiswas', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TugasAkhir $tugasAkhir)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'id_mahasiswa' => 'required|max:255',
            'dosen_pembimbing' => 'required|max:255',
            'file' => 'required|file|mimes:pdf,docx,xlsx|max:2048',
            /* 'tanggal' => 'required|date',
            'status' => 'required|max:255', */
        ]);

        $tugasAkhir->update($validatedData);

        // Update the related mahasiswa using ID
        $tugasAkhir->mahasiswa()->associate($request->input('id_mahasiswa'))->save();

        // Update the related dosen using ID
        $tugasAkhir->dosen()->associate($request->input('dosen_pembimbing'))->save();

        return redirect()->route('tugas_akhirs.index')->with('success', 'Tugas Akhir berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(TugasAkhir $tugasAkhir)
    {
        $tugasAkhir->delete();

        return redirect()->route('tugas_akhirs.index')->with('success', 'Tugas Akhir berhasil dihapus');
    }
}
