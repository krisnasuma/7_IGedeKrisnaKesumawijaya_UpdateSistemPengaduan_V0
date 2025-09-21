<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::where('masyarakat_id', Auth::id())->get();
        return view('masyarakat.pengajuan.index', compact('pengajuan'));
    }

    public function create()
    {
        return view('masyarakat.pengajuan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|in:izin,keluhan,permohonan,lainnya',
            'judul' => 'required|max:255',
            'deskripsi' => 'required'
        ]);

        $validated['masyarakat_id'] = Auth::id();

        Pengajuan::create($validated);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dikirim!');
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::where('masyarakat_id', Auth::id())->findOrFail($id);
        return view('masyarakat.pengajuan.show', compact('pengajuan'));
    }
}