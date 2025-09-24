@extends('layouts.app')

@section('title', 'Data Masyarakat')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Data Masyarakat Terdaftar</h2>
        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Terdaftar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($masyarakat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>
                            @if($item->terverifikasi)
                                <span class="badge bg-success">Terverifikasi</span>
                            @else
                                <span class="badge bg-warning">Belum Verifikasi</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection