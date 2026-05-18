<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();

        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'mapel' => 'required',
            'umur' => 'required|numeric',
            'foto' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        // ambil file foto
        $foto = $request->file('foto');

        // buat nama file baru
        $nama_file = time() . "-" . $foto->getClientOriginalName();

        // upload foto
        $foto->move(public_path('foto_guru'), $nama_file);

        // simpan ke database
        Guru::create([
            'nama' => $request->nama,
            'mapel' => $request->mapel,
            'umur' => $request->umur,
            'foto' => $nama_file
        ]);

        return redirect('/guru');
    }

    public function edit($id)
    {
        $guru = Guru::find($id);

        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'mapel' => 'required',
            'umur' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $guru = Guru::find($id);

        // Data yang selalu diupdate
        $data = [
            'nama' => $request->nama,
            'mapel' => $request->mapel,
            'umur' => $request->umur,
        ];

        // Proses foto hanya jika ada file baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage jika ada
            $fotoLama = public_path('foto_guru/' . $guru->foto);
            if ($guru->foto && file_exists($fotoLama)) {
                unlink($fotoLama);
            }

            $file = $request->file('foto');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('foto_guru'), $fileName);

            $data['foto'] = $fileName;
        }

        // Satu kali update ke database
        $guru->update($data);

        return redirect('/guru')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function delete($id)
    {
        $guru = Guru::find($id);

        // Hapus foto dari storage ketika guru dihapus
        $fotoPath = public_path('foto_guru/' . $guru->foto);
        if ($guru->foto && file_exists($fotoPath)) {
            unlink($fotoPath);
        }

        $guru->delete();

        return redirect('/guru')->with('success', 'Data guru berhasil dihapus.');
    }
}