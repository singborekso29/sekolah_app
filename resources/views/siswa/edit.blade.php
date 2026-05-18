@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Edit Siswa</h1>

        @if($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="/siswa/update/{{ $siswa->id }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nama</label>

                <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}">

            </div>

            <div class="mb-3">

                <label>Kelas</label>

                <input type="text" name="kelas" class="form-control" value="{{ $siswa->kelas }}">

            </div>

            <div class="mb-3">

                <label>Umur</label>

                <input type="number" name="umur" class="form-control" value="{{ $siswa->umur }}">

            </div>

            <div class="mb-3">

                <label>Alamat</label>

                <textarea name="alamat" class="form-control">{{ $siswa->alamat }}</textarea>

            </div>

            <div class="mb-3">

                <label>Foto Lama</label>

                <br>

                <img src="{{ asset('foto_siswa/' . $siswa->foto) }}" width="120">

            </div>

            <div class="mb-3">

                <label>Upload Foto Baru</label>

                <input type="file" name="foto" class="form-control">

            </div>

            <button type="submit" class="btn btn-primary">

                Update

            </button>

        </form>

    </div>

@endsection