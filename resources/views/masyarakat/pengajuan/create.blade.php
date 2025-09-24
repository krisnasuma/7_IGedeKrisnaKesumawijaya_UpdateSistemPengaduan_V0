@extends('layouts.app')

@section('title', 'Buat Pengajuan Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Buat Pengajuan Baru</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pengajuan.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Pengajuan</label>
                        <select class="form-select @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required>
                            <option value="">Pilih Jenis</option>
                            <option value="izin" {{ old('jenis') == 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="keluhan" {{ old('jenis') == 'keluhan' ? 'selected' : '' }}>Keluhan</option>
                            <option value="permohonan" {{ old('jenis') == 'permohonan' ? 'selected' : '' }}>Permohonan</option>
                            <option value="lainnya" {{ old('jenis') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('jenis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Pengajuan</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul') }}" required>
                        @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Lengkap</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                        <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection