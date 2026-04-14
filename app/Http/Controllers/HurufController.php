<?php

namespace App\Http\Controllers;

use App\Models\Huruf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HurufController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        $huruf = Huruf::when($search, function ($query) use ($search) {
            return $query->where('nama_huruf', 'like', "%{$search}%")
                         ->orWhere('kalimat', 'like', "%{$search}%");
        })->with('katas')->paginate(10);
        
        return view('huruf.index', compact('huruf', 'search'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_huruf' => 'required',
            'kalimat' => 'required',
        ]);

        $firstHuruf = Str::lower(mb_substr(trim($validatedData['nama_huruf']), 0, 1));
        $firstKata = Str::lower(mb_substr(trim($validatedData['kalimat']), 0, 1));

        if ($firstHuruf !== $firstKata) {
            return back()->withInput()->withErrors(['kalimat' => 'Kata contoh harus dimulai dengan huruf yang sama.']);
        }

        Huruf::create($validatedData);

        return redirect('/huruf');
    }

    public function create()
    {
        return view('huruf.tambah');
    }

    public function show($id)
    {
        $huruf = Huruf::findOrFail($id);
        return view('huruf.show', ['data_huruf' => $huruf]);
    }

    public function edit($id)
    {
        $huruf = Huruf::findOrFail($id);
        return view('huruf.edit', ['data_huruf' => $huruf]);
    }

    public function update(Request $request, $id)
    {
        $huruf = Huruf::findOrFail($id);

        $request->validate([
            'nama_huruf' => 'required',
            'kalimat' => 'required',
        ]);

        $firstHuruf = Str::lower(mb_substr(trim($request->nama_huruf), 0, 1));
        $firstKata = Str::lower(mb_substr(trim($request->kalimat), 0, 1));

        if ($firstHuruf !== $firstKata) {
            return back()->withInput()->withErrors(['kalimat' => 'Kata contoh harus dimulai dengan huruf yang sama.']);
        }

        $huruf->update([
            'nama_huruf' => $request->nama_huruf,
            'kalimat' => $request->kalimat,
        ]);

        return redirect('/huruf');
    }

    public function destroy($id)
    {   
        Huruf::destroy($id);
        return redirect('/huruf');
    }
} 