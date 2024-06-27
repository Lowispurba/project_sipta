<?php

namespace App\Http\Controllers;

use App\Models\notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index(Request $request)  // Add Request $request parameter
    {
        // Get the number of entries per page from the request, default to 10 if not present
        $perPage = $request->input('perPage', 10);
        $notifikasis = notifikasi::paginate($perPage);

        return view('pages.notifikasi', compact('notifikasis'));
    }

    public function create()
    {
        return view('crud.notifikasicreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'penerima' => 'required|string',
        ]);

        notifikasi::create($request->all());
        return redirect()->route('notifikasi.index')->with('success', 'notifikasi berhasil ditambahkan');
    }

    public function show(notifikasi $notifikasi)
    {
        return view('crud.notifikasishow', compact('notifikasi'));
    }

    public function edit(notifikasi $notifikasi)
    {
        return view('crud.notifikasiedit', compact('notifikasi'));
    }

    public function update(Request $request, notifikasi $notifikasi)
    {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'penerima' => 'required|string',
        ]);

        $notifikasi->update($request->all());
        return redirect()->route('notifikasi.index')->with('success', 'notifikasi berhasil diperbarui');
    }

    public function destroy(notifikasi $notifikasi)
    {
        $notifikasi->delete();
        return redirect()->route('notifikasi.index')->with('success', 'notifikasi berhasil dihapus');
    }
}
