<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    private $pegawai = [
        [
            'id' => 1,
            'nama' => 'Yola Valery',
            'jabatan' => 'CEO AXERA MOTOR',
            'email' => 'yola@example.com',
            'foto' => 'img/marsya.jpeg'
        ],
        [
            'id' => 2,
            'nama' => 'Rian Saputra',
            'jabatan' => 'Montir',
            'email' => 'rian@example.com',
            'foto' => 'img/jcwk.jpeg'
        ],
        [
            'id' => 3,
            'nama' => 'Intan Ayu',
            'jabatan' => 'Kasir',
            'email' => 'intan@example.com',
            'foto' => 'img/putri.jpeg'
        ],
    ];

    public function index()
    {
        $pegawai = $this->pegawai;
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        // sementara hanya redirect
        return redirect()->route('pegawai.index')->with('success', 'Fitur tambah aktif (statis)');
    }

    public function edit($id)
    {
        $pegawai = collect($this->pegawai)->firstWhere('id', $id);

        if (!$pegawai) {
            abort(404);
        }

        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('pegawai.index')->with('success', 'Fitur edit aktif (statis)');
    }

    public function destroy($id)
    {
        return redirect()->route('pegawai.index')->with('success', 'Fitur hapus aktif (statis)');
    }
}
