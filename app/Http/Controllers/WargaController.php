<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Menampilkan semua data warga dengan fitur pencarian.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Jika kolom pencarian kosong, tampilkan semua data
        $wargas = Warga::query()
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('nik', 'like', "%{$search}%");
            })
            ->orderBy('nama', 'asc')
            ->get();

        return view('warga.index', compact('wargas', 'search'));
    }

    /**
     * Menampilkan form tambah data warga.
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * Menyimpan data warga baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|unique:wargas,nik',
            'no_kk' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'status_rumah' => 'required|in:Hak Milik,Sewa',
        ]);

        Warga::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_rumah' => $request->status_rumah,
        ]);

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu data warga.
     */
    public function show($id)
    {
        $warga = Warga::findOrFail($id);
        return view('warga.show', compact('warga'));
    }

    /**
     * Menampilkan form edit data warga.
     */
    public function edit(Warga $warga)
    {
        return view('warga.edit', compact('warga'));
    }

    /**
     * Mengupdate data warga yang sudah ada.
     */
    public function update(Request $request, Warga $warga)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|unique:wargas,nik,' . $warga->id,
            'no_kk' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'status_rumah' => 'required|in:Hak Milik,Sewa',
        ]);

        $warga->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_rumah' => $request->status_rumah,
        ]);

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil diupdate.');
    }

    /**
     * Menghapus data warga dari database.
     */
    public function destroy(Warga $warga)
    {
        $warga->delete();

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil dihapus.');
    }
}
