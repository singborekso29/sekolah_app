<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    public function index()
    {
        $siswa = siswa::all();

        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        // ambil file foto
        $foto = $request->file('foto');

        // buat nama file baru
        $nama_file = time() . "-" . $foto->getClientOriginalName();

        // upload foto
        $foto->move(public_path('foto_siswa'), $nama_file);

        // simpan ke database
        siswa::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'foto' => $nama_file
        ]);

        return redirect('/siswa');
    }

    public function edit($id)
    {
        $siswa = siswa::find($id);

        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $siswa = siswa::find($id);

        // Data yang selalu diupdate
        $data = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'umur' => $request->umur,
            'alamat' => $request->alamat

        ];

        // Proses foto hanya jika ada file baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage jika ada
            $fotoLama = public_path('foto_siswa/' . $siswa->foto);
            if ($siswa->foto && file_exists($fotoLama)) {
                unlink($fotoLama);
            }

            $file = $request->file('foto');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('foto_siswa'), $fileName);

            $data['foto'] = $fileName;
        }

        // Satu kali update ke database
        $siswa->update($data);

        return redirect('/siswa')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function delete($id)
    {
        $siswa = siswa::find($id);

        // Hapus foto dari storage ketika siswa dihapus
        $fotoPath = public_path('foto_siswa/' . $siswa->foto);
        if ($siswa->foto && file_exists($fotoPath)) {
            unlink($fotoPath);
        }

        $siswa->delete();

        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus.');
    }
}