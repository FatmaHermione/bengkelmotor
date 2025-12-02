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
        return view('pegawai', compact('pegawai'));
    }

    public function create()
    {
        return "Form create tidak dibuat karena hanya memakai 1 view.";
    }

    public function store(Request $request)
    {
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambah (statis).');
    }

    public function edit($id)
    {
        return "Form edit tidak dibuat karena hanya memakai 1 view.";
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diedit (statis).');
    }

    public function destroy($id)
    {
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus (statis).');
    }
}
