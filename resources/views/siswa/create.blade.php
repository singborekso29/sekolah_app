@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Tambah Siswa</h1>

        @if($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="/siswa/store" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label>Nama</label>

                <input type="text" name="nama" class="form-control">

            </div>

            <div class="mb-3">

                <label>Kelas</label>

                <input type="text" name="kelas" class="form-control">

            </div>

            <div class="mb-3">

                <label>Umur</label>

                <input type="number" name="umur" class="form-control">

            </div>

            <div class="mb-3">

                <label>Alamat</label>

                <textarea name="alamat" class="form-control"></textarea>

            </div>

            <div class="mb-3">

                <label>Foto</label>

                <input type="file" name="foto" class="form-control">

            </div>

            <button type="submit" class="btn btn-primary">

                Simpan

            </button>

        </form>

    </div>

@endsection