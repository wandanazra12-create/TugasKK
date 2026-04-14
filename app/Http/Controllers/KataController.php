<?php

namespace App\Http\Controllers;

use App\Models\Huruf;
use App\Models\Kata;
use Illuminate\Http\Request;

class KataController extends Controller
{
    public function index($huruf_id)
    {
        $huruf = Huruf::findOrFail($huruf_id);
        $katas = $huruf->katas()->paginate(12);
        return view('kata.index', compact('huruf', 'katas'));
    }

    public function create($huruf_id)
    {
        $huruf = Huruf::findOrFail($huruf_id);
        return view('kata.create', compact('huruf'));
    }

    public function store(Request $request, $huruf_id)
    {
        $huruf = Huruf::findOrFail($huruf_id);

        $validated = $request->validate([
            'kata' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $huruf->katas()->create($validated);

        return redirect()->route('kata.index', $huruf_id)
                        ->with('success', 'Kata berhasil ditambahkan!');
    }

    public function show($huruf_id, $kata_id)
    {
        $huruf = Huruf::findOrFail($huruf_id);
        $kata = Kata::findOrFail($kata_id);
        return view('kata.show', compact('huruf', 'kata'));
    }

    public function edit($huruf_id, $kata_id)
    {
        $huruf = Huruf::findOrFail($huruf_id);
        $kata = Kata::findOrFail($kata_id);
        return view('kata.edit', compact('huruf', 'kata'));
    }

    public function update(Request $request, $huruf_id, $kata_id)
    {
        $huruf = Huruf::findOrFail($huruf_id);
        $kata = Kata::findOrFail($kata_id);

        $validated = $request->validate([
            'kata' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $kata->update($validated);

        return redirect()->route('kata.index', $huruf_id)
                        ->with('success', 'Kata berhasil diperbarui!');
    }

    public function destroy($huruf_id, $kata_id)
    {
        $kata = Kata::findOrFail($kata_id);
        $kata->delete();

        return redirect()->route('kata.index', $huruf_id)
                        ->with('success', 'Kata berhasil dihapus!');
    }
}

