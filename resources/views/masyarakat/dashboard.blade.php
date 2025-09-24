@extends('layouts.app')

@section('title', 'Dashboard Masyarakat')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Dashboard Masyarakat</h2>
        <p>Selamat datang, <strong>{{ Auth::guard('masyarakat')->user()->nama }}</strong></p>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Buat Pengajuan Baru</h5>
                <p class="card-text">Ajukan permohonan atau keluhan baru</p>
                <a href="{{ route('pengajuan.create') }}" class="btn btn-primary">Buat Pengajuan</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Lihat Pengajuan</h5>
                <p class="card-text">Lihat status pengajuan Anda</p>
                <a href="{{ route('pengajuan.index') }}" class="btn btn-success">Daftar Pengajuan</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Profil Saya</h5>
                <p class="card-text">Kelola informasi akun Anda</p>
                <button class="btn btn-info" disabled>Profil (Coming Soon)</button>
            </div>
        </div>
    </div>
</div>
@endsection