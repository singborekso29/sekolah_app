@extends('layouts.app')

@section('content')

    <h1 class="mb-4">Tambah Guru</h1>

    @if($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="/guru/store" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label>Nama</label>

            <input type="text" name="nama" class="form-control">

        </div>

        <div class="mb-3">

            <label>Mapel</label>

            <input type="text" name="mapel" class="form-control">

        </div>

        <div class="mb-3">

            <label>Umur</label>

            <input type="number" name="umur" class="form-control">

        </div>

        <div class="mb-3">

            <label>Foto</label>

            <input type="file" name="foto" class="form-control">

        </div>
        <button type="submit" class="btn btn-primary">

            Simpan

        </button>

    </form>

@endsection