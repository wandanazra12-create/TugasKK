@extends('layouts.main')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div style="margin-bottom: 20px;">
        <a href="{{ route('huruf.index') }}" style="color: #007bff; text-decoration: none;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Edit Huruf</h2>
        </div>

        <form action="{{ route('huruf.update', $data_huruf->id) }}" method="POST" style="padding: 20px;">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label for="nama_huruf" style="display: block; margin-bottom: 8px; font-weight: 600;">Karakter Huruf</label>
                <input type="text" name="nama_huruf" id="nama_huruf" 
                    class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;" 
                    value="{{ old('nama_huruf', $data_huruf->nama_huruf) }}" maxlength="1" required>
                @error('nama_huruf')
                    <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="kalimat" style="display: block; margin-bottom: 8px; font-weight: 600;">Contoh Kalimat</label>
                <textarea name="kalimat" id="kalimat" rows="5" 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; font-family: inherit;"
                    required>{{ old('kalimat', $data_huruf->kalimat) }}</textarea>
                @error('kalimat')
                    <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-warning" style="flex: 1;">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('huruf.index') }}" class="btn" style="background-color: #6c757d; color: white;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
