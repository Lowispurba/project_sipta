<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = dosen::orderBy('nama')->get();
        return view('pages.dosen', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.dosencreate');
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nip' => 'required|unique:dosens',
            'no_telp' => 'required|string',
            'email' => 'required|email|unique:dosens',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dosenData = $request->all();

        if ($request->hasFile('foto')) {
            try {
                $fileName = time() . '.' . $request->foto->getClientOriginalExtension();
                $request->foto->storeAs('public/uploads', $fileName); // Store in 'public/uploads'
                $dosenData['foto'] = $fileName;
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['upload_error' => 'Gagal mengunggah foto profil.'])->withInput();
            }
        }

        Dosen::create($dosenData);
        return redirect('/dosen');
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        return view('crud.dosenshow', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $dosen = dosen::findOrFail($id);
        return view('crud.dosenedit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nip' => 'required|unique:dosens,nip,' . $id,
            'no_telp' => 'required|string',
            'email' => 'required|email|unique:dosens,email,' . $id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Perbaikan aturan validasi untuk 'foto'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dosen = Dosen::findOrFail($id);
        $dosenData = $request->all();

        if ($request->hasFile('foto')) {
            try {
                $fileName = time() . '.' . $request->foto->getClientOriginalExtension();
                $request->foto->storeAs('public/uploads', $fileName);
                $dosenData['foto'] = $fileName;
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['upload_error' => 'Gagal mengunggah foto profil.'])->withInput();
            }
        }

        $dosen->update($dosenData);

        return redirect('/dosen')->with('success', 'Data berhasil diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)

    {
        $data=dosen::find($id);
        $data->delete();
        return redirect('/dosen')->with('Success','Data Berhasil Dihapus');
    }
}
