<?php

namespace App\Http\Controllers;

use App\Models\dokumen;
use Illuminate\Http\Request;
use App\Models\TugasAkhir;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dokumens = dokumen::with('tugasAkhir')->paginate(10); // Adjust default pagination size as needed

        $entries = $request->query('entries', 10); // Get entries per page from query string

        return view('pages.dokumen', compact('dokumens', 'entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tugasAkhirs = TugasAkhir::all(); // Get all tugas akhir for dropdown

        return view('crud.dokumencreate', compact('tugasAkhirs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'id_tugasakhir' => 'required|exists:tugas_akhirs,id',
        'nama' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'file' => 'required|file|mimes:pdf,docx,xlsx|max:2048', // Atur aturan validasi file sesuai kebutuhan
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

    return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dibuat!');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dokumen = dokumen::with('tugasAkhir')->find($id);

        if (!$dokumen) {
            return abort(404);
        }

        return view('crud.dokumenshow', compact('dokumen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokumen = Dokumen::with('tugasAkhir')->find($id);
        $tugasAkhirs = TugasAkhir::all(); // Get all tugas akhir for dropdown

        if (!$dokumen) {
            return abort(404);
        }

        return view('crud.dokumenedit', compact('dokumen', 'tugasAkhirs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'id_tugasakhir' => 'required|exists:tugas_akhirs,id',
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,docx,xlsx|max:2048', // Optional file upload
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $dokumen = Dokumen::find($id);

        if (!$dokumen) {
            return redirect()->route('dokumen.index')->with('error', 'Dokumen tidak ditemukan.');
        }

        $dokumen->id_tugasakhir = $request->id_tugasakhir;
        $dokumen->nama = $request->nama;
        $dokumen->lokasi = $request->lokasi;

        // Handle file upload if a new file is provided
        if ($request->hasFile('file')) {
            // Delete the old file if exists
            if ($dokumen->file && Storage::exists('public/upload/' . $dokumen->file)) {
                Storage::delete('public/upload/' . $dokumen->file);
            }

            $fileName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->storeAs('public/upload', $fileName);
            $dokumen->file = $fileName;
        }

        $dokumen->save();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $dokumen = Dokumen::find($id);

        if (!$dokumen) {
            return redirect()->route('dokumen.index')->with('error', 'Dokumen tidak ditemukan.');
        }

        $dokumen->delete();
        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}
