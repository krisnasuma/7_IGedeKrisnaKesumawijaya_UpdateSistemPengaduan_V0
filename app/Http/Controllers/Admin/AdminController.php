<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_pengajuan' => Pengajuan::count(),
            'pengajuan_menunggu' => Pengajuan::where('status', 'menunggu')->count(),
            'pengajuan_diproses' => Pengajuan::where('status', 'diproses')->count(),
            'total_masyarakat' => Masyarakat::count()
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function pengajuan()
    {
        // Gunakan with() untuk eager loading relasi
        $pengajuan = Pengajuan::with(['masyarakat', 'admin'])->get();
        return view('admin.pengajuan.index', compact('pengajuan'));
    }

    public function updatePengajuan(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai,ditolak',
            'keterangan' => 'nullable|string'
        ]);

        $validated['admin_id'] = auth()->id();

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update($validated);

        return back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }

    public function dataMasyarakat()
    {
        $masyarakat = Masyarakat::all();
        return view('admin.masyarakat.index', compact('masyarakat'));
    }

    public function verifikasiMasyarakat(Request $request, $id)
    {
        $masyarakat = Masyarakat::findOrFail($id);
        $masyarakat->update(['terverifikasi' => true]);

        return back()->with('success', 'Data masyarakat telah diverifikasi!');
    }
}