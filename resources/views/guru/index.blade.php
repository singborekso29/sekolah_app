@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Guru</h1>
    
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Guru
    </a>
    
    <a href="{{ route('guru.cetak-semua') }}" class="btn btn-danger mb-3" target="_blank">
        <i class="fas fa-file-pdf"></i> Cetak Semua PDF
    </a>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Mata Pelajaran</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($guru as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($item->foto && file_exists(public_path('foto_guru/' . $item->foto)))
                            <img src="{{ asset('foto_guru/' . $item->foto) }}" 
                                 width="50" height="50" 
                                 style="object-fit: cover; border-radius: 50%;">
                        @else
                            <i class="fas fa-user-circle" style="font-size: 40px; color: #ccc;"></i>
                        @endif
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->mapel }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>
                        <a href="{{ route('guru.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('guru.cetak-pdf', $item->id) }}" class="btn btn-danger btn-sm" target="_blank">Cetak PDF</a>
                        <form action="{{ route('guru.destroy', $item->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus data guru {{ $item->nama }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data guru</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection