@extends('dashboard.layout')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between mb-3">

            <h1>Data Siswa</h1>

            <a href="/siswa/create" class="btn btn-primary">
                Tambah Siswa
            </a>

        </div>

        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @foreach($siswa as $data)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <img src="{{ asset('foto_siswa/' . $data->foto) }}" width="80">
                        </td>

                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->kelas }}</td>
                        <td>{{ $data->umur }}</td>
                        <td>{{ $data->alamat }}</td>

                        <td>

                            <a href="/siswa/edit/{{ $data->id }}" class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="/siswa/delete/{{ $data->id }}" method="POST" style="display:inline-block;">

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

    </div>

@endsection