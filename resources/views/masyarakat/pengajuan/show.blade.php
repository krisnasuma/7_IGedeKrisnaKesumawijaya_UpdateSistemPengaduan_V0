@extends('layouts.app')

@section('title', 'Detail Pengajuan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Detail Pengajuan</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Judul:</div>
                    <div class="col-md-8">{{ $pengajuan->judul }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Jenis:</div>
                    <div class="col-md-8">{{ ucfirst($pengajuan->jenis) }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Status:</div>
                    <div class="col-md-8">
                        <span class="status-{{ $pengajuan->status }}">
                            {{ ucfirst($pengajuan->status) }}
                        </span>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Tanggal Dibuat:</div>
                    <div class="col-md-8">{{ $pengajuan->created_at->format('d/m/Y H:i') }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Deskripsi:</div>
                    <div class="col-md-8">
                        <p>{{ $pengajuan->deskripsi }}</p>
                    </div>
                </div>
                
                @if($pengajuan->keterangan)
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Keterangan Admin:</div>
                    <div class="col-md-8">
                        <p class="text-muted">{{ $pengajuan->keterangan }}</p>
                    </div>
                </div>
                @endif

                <div class="d-flex gap-2">
                    <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Kembali</a>
                    @if($pengajuan->status == 'menunggu')
                    <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Hapus pengajuan ini?')">Hapus</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection