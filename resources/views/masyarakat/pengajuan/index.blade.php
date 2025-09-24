@extends('layouts.app')

@section('title', 'Daftar Pengajuan')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Pengajuan Saya</h2>
            <a href="{{ route('pengajuan.create') }}" class="btn btn-primary">
                + Buat Pengajuan Baru
            </a>
        </div>

        @if($pengajuan->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengajuan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ ucfirst($item->jenis) }}</td>
                            <td>
                                <span class="status-{{ $item->status }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('pengajuan.show', $item->id) }}" class="btn btn-sm btn-info">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">
                <p>Anda belum memiliki pengajuan. <a href="{{ route('pengajuan.create') }}">Buat pengajuan pertama Anda!</a></p>
            </div>
        @endif
    </div>
</div>
@endsection