<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Menampilkan semua data siswa
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    // Menampilkan form tambah siswa
    public function create()
    {
        return view('siswa.create');
    }

    // Menyimpan data siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nisn' => 'required|string|unique:siswas,nisn',
            'nik' => 'required|string|unique:siswas,nik',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required|integer|min:1|max:100',
            'agama' => 'required',
            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'jumlah_saudara' => 'required|integer|min:0',
            'asal_sekolah' => 'required|string|max:255',
            'diterima_di_sekolah' => 'required|string',
            'no_ijazah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $nama_file = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_file = time() . '-' . $foto->getClientOriginalName();
            $foto->move(public_path('foto_siswa'), $nama_file);
        }

        Siswa::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
            'agama' => $request->agama,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'jumlah_saudara' => $request->jumlah_saudara,
            'asal_sekolah' => $request->asal_sekolah,
            'diterima_di_sekolah' => $request->diterima_di_sekolah,
            'no_ijazah' => $request->no_ijazah,
            'alamat' => $request->alamat,
            'foto' => $nama_file
        ]);

        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    // Menampilkan detail siswa
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    // Menampilkan form edit siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    // Mengupdate data siswa
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nisn' => 'required|string|unique:siswas,nisn,'.$id,
            'nik' => 'required|string|unique:siswas,nik,'.$id,
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required|integer|min:1|max:100',
            'agama' => 'required',
            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'jumlah_saudara' => 'required|integer|min:0',
            'asal_sekolah' => 'required|string|max:255',
            'diterima_di_sekolah' => 'required|string',
            'no_ijazah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->except('_token', '_method', 'foto');

        if ($request->hasFile('foto')) {
            if ($siswa->foto && file_exists(public_path('foto_siswa/' . $siswa->foto))) {
                unlink(public_path('foto_siswa/' . $siswa->foto));
            }

            $file = $request->file('foto');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('foto_siswa'), $fileName);
            $data['foto'] = $fileName;
        }

        $siswa->update($data);

        return redirect('/siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->foto && file_exists(public_path('foto_siswa/' . $siswa->foto))) {
            unlink(public_path('foto_siswa/' . $siswa->foto));
        }

        $siswa->delete();

        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}