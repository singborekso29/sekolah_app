@extends('dashboard.layout')

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

                <select name="kelas" class="form-select">

                    <option value="">
                        -- Pilih Kelas --
                    </option>

                    <option value="VII-A">VII-A</option>
                    <option value="VII-B">VII-B</option>
                    <option value="VII-C">VII-C</option>

                    <option value="VIII-A">VIII-A</option>
                    <option value="VIII-B">VIII-B</option>
                    <option value="VIII-C">VIII-C</option>

                    <option value="IX-A">IX-A</option>
                    <option value="IX-B">IX-B</option>
                    <option value="IX-C">IX-C</option>

                </select>

            </div>
            <div class="mb-3">

                <label>Jenis Kelamin</label>

                <select name="jenis_kelamin" class="form-select">

                    <option value="">
                        -- Pilih Jenis Kelamin --
                    </option>

                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>

                </select>

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