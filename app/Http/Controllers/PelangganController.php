<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = User::where('role', 'user')->get();
        return view('admin.pelanggan.index', compact('pelanggans'));
    }

    public function edit(User $user)
    {
        return view('admin.pelanggan.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()
            ->route('admin.pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Admin tidak bisa dihapus');
        }

        $user->delete();

        return back()->with('success', 'Pelanggan berhasil dihapus');
    }
}
