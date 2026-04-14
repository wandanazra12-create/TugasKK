<?php

namespace App\Http\Controllers;

use App\Models\Huruf;
use App\Models\Kata;
use App\Models\Kalimat;
use Illuminate\Http\Request;

class KalimatController extends Controller
{
    public function index($huruf_id, $kata_id)
    {
        $huruf = Huruf::findOrFail($huruf_id);
        $kata = Kata::findOrFail($kata_id);
        $kalimats = $kata->kalimats()->paginate(10);
        return view('kalimat.index', compact('huruf', 'kata', 'kalimats'));
    }

    public function create($huruf_id, $kata_id)
    {
        $huruf = Huruf::findOrFail($huruf_id);
        $kata = Kata::findOrFail($kata_id);
        return view('kalimat.create', compact('huruf', 'kata'));
    }

    public function store(Request $request, $huruf_id, $kata_id)
    {
        $kata = Kata::findOrFail($kata_id);

        $validated = $request->validate([
            'kalimat' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $kata->kalimats()->create($validated);

        return redirect()->route('kalimat.index', [$huruf_id, $kata_id])
                        ->with('success', 'Kalimat berhasil ditambahkan!');
    }

    public function show($huruf_id, $kata_id, $kalimat_id)
    {
        $huruf = Huruf::findOrFail($huruf_id);
        $kata = Kata::findOrFail($kata_id);
        $kalimat = Kalimat::findOrFail($kalimat_id);
        return view('kalimat.show', compact('huruf', 'kata', 'kalimat'));
    }

    public function edit($huruf_id, $kata_id, $kalimat_id)
    {
        $huruf = Huruf::findOrFail($huruf_id);
        $kata = Kata::findOrFail($kata_id);
        $kalimat = Kalimat::findOrFail($kalimat_id);
        return view('kalimat.edit', compact('huruf', 'kata', 'kalimat'));
    }

    public function update(Request $request, $huruf_id, $kata_id, $kalimat_id)
    {
        $kalimat = Kalimat::findOrFail($kalimat_id);

        $validated = $request->validate([
            'kalimat' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $kalimat->update($validated);

        return redirect()->route('kalimat.index', [$huruf_id, $kata_id])
                        ->with('success', 'Kalimat berhasil diperbarui!');
    }

    public function destroy($huruf_id, $kata_id, $kalimat_id)
    {
        $kalimat = Kalimat::findOrFail($kalimat_id);
        $kalimat->delete();

        return redirect()->route('kalimat.index', [$huruf_id, $kata_id])
                        ->with('success', 'Kalimat berhasil dihapus!');
    }
}

