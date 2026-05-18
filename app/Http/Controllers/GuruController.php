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
            'umur' => 'required|numeric'
        ]);

        Guru::create([
            'nama' => $request->nama,
            'mapel' => $request->mapel,
            'umur' => $request->umur
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
            'umur' => 'required|numeric'
        ]);

        $guru = Guru::find($id);

        $guru->update([
            'nama' => $request->nama,
            'mapel' => $request->mapel,
            'umur' => $request->umur
        ]);

        return redirect('/guru');
    }

    public function delete($id)
    {
        $guru = Guru::find($id);

        $guru->delete();

        return redirect('/guru');
    }
}