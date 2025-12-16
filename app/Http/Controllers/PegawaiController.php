<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    // ======================
    // READ (LIST DATA)
    // ======================
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    // ======================
    // CREATE (FORM TAMBAH)
    // ======================
    public function create()
    {
        return view('pegawai.create');
    }

    // ======================
    // STORE (SIMPAN DATA BARU)
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'jabatan' => 'required',
            'email'   => 'required|email|unique:pegawais,email',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Foto default
        $pathFoto = 'img/no-image.jpg';

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $namaFile);
            $pathFoto = 'img/' . $namaFile;
        }

        Pegawai::create([
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
            'email'   => $request->email,
            'foto'    => $pathFoto,
        ]);

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil ditambahkan');
    }

    // ======================
    // EDIT (FORM EDIT)
    // ======================
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    // ======================
    // UPDATE (SIMPAN PERUBAHAN)
    // ======================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required',
            'jabatan' => 'required',
            'email'   => 'required|email|unique:pegawais,email,' . $id,
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pegawai = Pegawai::findOrFail($id);

        $data = [
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
            'email'   => $request->email,
        ];

        if ($request->hasFile('foto')) {
            // hapus foto lama (kecuali default)
            if (
                $pegawai->foto &&
                File::exists(public_path($pegawai->foto)) &&
                $pegawai->foto !== 'img/no-image.jpg'
            ) {
                File::delete(public_path($pegawai->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $namaFile);
            $data['foto'] = 'img/' . $namaFile;
        }

        $pegawai->update($data);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui');
    }

    // ======================
    // DESTROY (HAPUS DATA)
    // ======================
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        if (
            $pegawai->foto &&
            File::exists(public_path($pegawai->foto)) &&
            $pegawai->foto !== 'img/no-image.jpg'
        ) {
            File::delete(public_path($pegawai->foto));
        }

        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus');
    }
}
