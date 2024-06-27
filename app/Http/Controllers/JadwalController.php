<?php

namespace App\Http\Controllers;

use App\Models\jadwal; // Import model Jadwal
use App\Models\TugasAkhir; // Import model TugasAkhir (optional)
use App\Models\ruangan; // Import model ruang (optional)
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Menampilkan daftar semua data jadwal.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = jadwal::all(); // Ambil semua data dari tabel jadwal

        return view('pages.jadwal', ['data' => $data]); // Tampilkan di view 'jadwal.index' dengan data
    }

    /**
     * Menampilkan detail data jadwal berdasarkan ID.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = jadwal::find($id); // Temukan data dengan ID tertentu

        if (!$data) {
            return abort(404); // Kembalikan error 404 jika data tidak ditemukan
        }

        $tugasAkhir = TugasAkhir::find($data->id_tugasakhir); // Ambil data tugas akhir terkait (optional)
        $ruang = ruangan::find($data->id_ruang); // Ambil data ruang terkait (optional)

        return view('crud.jadwalshow', ['data' => $data, 'tugasAkhir' => $tugasAkhir, 'ruang' => $ruang]); // Tampilkan di view 'jadwal.show' dengan data
    }

    /**
     * Menampilkan formulir untuk membuat data jadwal baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tugasAkhir = TugasAkhir::all(); // Ambil semua data tugas akhir
        $ruang = ruangan::all(); // Ambil semua data ruang

        return view('crud.jadwalcreate', [
            'tugasAkhir' => $tugasAkhir,
            'ruang' => $ruang,
        ]);
    }

    /**
     * Menyimpan data jadwal baru ke dalam database.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_tugasakhir' => 'required|integer',
            'id_ruang' => 'required|integer',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
        ]);

        Jadwal::create($validatedData); // Simpan data baru ke database

        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil disimpan!'); // Redirect ke halaman index dengan pesan sukses
    }

    /**
     * Menampilkan formulir untuk mengedit data jadwal berdasarkan ID.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = jadwal::find($id); // Temukan data dengan ID tertentu

        if (!$data) {
            return abort(404); // Kembalikan error 404 jika data tidak ditemukan
        }

        $tugasAkhir = TugasAkhir::all(); // Ambil semua data tugas akhir (optional)
        $ruang = ruangan::all(); // Ambil semua data ruang (optional)

        return view('crud.jadwaledit', ['data' => $data, 'tugasAkhir' => $tugasAkhir, 'ruang' => $ruang]); // Tampilkan di view 'jadwal.edit' dengan data
    }

    /**
     * Memperbarui data jadwal di database berdasarkan ID.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_tugasakhir' => 'required|integer',
            'id_ruang' => 'required|integer',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
        ]);
        $data = jadwal::find($id);

        if (!$data) {
            return abort(404);
        }

        $data->update($validatedData); // Perbarui data di database

        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil diubah!'); // Redirect ke halaman index dengan pesan sukses
    }

    /**
     * Menghapus data jadwal dari database berdasarkan ID.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jadwal::find($id);

        if (!$data) {
            return abort(404);
        }

        $data->delete(); // Hapus data dari database

        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil dihapus!'); // Redirect ke halaman index dengan pesan sukses
    }
}
