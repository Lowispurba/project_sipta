<?php

namespace App\Http\Controllers;

use App\Models\penilaian;
use App\Models\TugasAkhir;
use App\Models\Dosen;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Tampilkan daftar semua penilaian.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penilaians = penilaian::with('tugasAkhir', 'dosenPenguji')->get();

        return view('pages.penilaian', compact('penilaians'));
    }

    /**
     * Tampilkan detail penilaian tertentu beserta relasi tugas akhir dan dosen penguji.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penilaian = penilaian::findOrFail($id);
        $tugasAkhir = TugasAkhir::all();
        $dosen = dosen::all();

        return view('crud.penilaianedit', compact('penilaian', 'tugasAkhir', 'dosen'));
    }
    public function show($id)
    {
        $penilaian = penilaian::with('tugasAkhir', 'dosenPenguji')->findOrFail($id);

        return view('crud.penilaianshow', compact('penilaian'));
    }

    /**
     * Buat penilaian baru dengan validasi dan relasi tugas akhir dan dosen penguji.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tugasAkhir = TugasAkhir::all();
        $dosen = dosen::all();

        return view('crud.penilaiancreate', compact('tugasAkhir', 'dosen'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_tugasakhir' => 'required|integer|exists:tugas_akhirs,id',
            'dosen_penguji' => 'required|integer|exists:dosens,id',
            'nilai' => 'required|numeric',
            'komentar' => 'required|string',
        ]);

        $penilaian = penilaian::create($validatedData);

        return redirect()->route('penilaian.index')->with('success', 'penilaian baru berhasil dibuat!');
    }

    /**
     * Perbarui penilaian tertentu dengan validasi dan relasi tugas akhir dan dosen penguji.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penilaian = penilaian::findOrFail($id);

        $validatedData = $request->validate([
            'id_tugasakhir' => 'required|integer|exists:tugas_akhirs,id',
            'dosen_penguji' => 'required|integer|exists:dosens,id',
            'nilai' => 'required|numeric',
            'komentar' => 'required|string',
        ]);

        $penilaian->update($validatedData);

        return redirect()->route('penilaian.index')->with('success', 'penilaian berhasil diperbarui!');
    }

    /**
     * Hapus penilaian tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penilaian = penilaian::findOrFail($id);

        $penilaian->delete();

        return redirect()->route('penilaian.index')->with('success', 'penilaian berhasil dihapus!');
    }
}
