@extends('layouts.app')

@section('content')

    <h1 class="mb-4">Data Guru</h1>

    <a href="/guru/create" class="btn btn-primary mb-3">
        Tambah Guru
    </a>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Mapel</th>
                <th>Umur</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @foreach($guru as $data)

                <tr>

                    <td>{{ $data->id }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->mapel }}</td>
                    <td>{{ $data->umur }}</td>
                    <td>
                        <img src="{{ asset('foto_guru/' . $data->foto) }}" width="80">
                    </td>

                    <td>

                        <a href="/guru/edit/{{ $data->id }}" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="/guru/delete/{{ $data->id }}" method="POST" style="display:inline;">

                            @csrf

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

@endsection