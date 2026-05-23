@extends('dashboard.layout')

@section('content')

    <div class="container">

        <h1>Edit Guru</h1>

        @if($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="/guru/update/{{ $guru->id }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nama</label>

                <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}">

            </div>

            <div class="mb-3">

                <label>Mapel</label>

                <input type="text" name="mapel" class="form-control" value="{{ $guru->mapel }}">

            </div>

            <div class="mb-3">

                <label>Umur</label>

                <input type="number" name="umur" class="form-control" value="{{ $guru->umur }}">

            </div>

            <div class="mb-3">

                <label>Foto Lama</label>

                <br>

                <img src="{{ asset('foto_guru/' . $guru->foto) }}" width="120">

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