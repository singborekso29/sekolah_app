@extends('layouts.app')

@section('content')

    <h1 class="mb-4">Edit Guru</h1>

    @if($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="/guru/update/{{ $guru->id }}" method="POST">

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

        <button type="submit" class="btn btn-success">

            Update

        </button>

    </form>

@endsection