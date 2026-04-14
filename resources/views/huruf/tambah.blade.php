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
            <h2>Tambah Huruf Baru</h2>
        </div>

        <form action="{{ route('huruf.store') }}" method="POST" style="padding: 20px;">
            @csrf

            <div style="margin-bottom: 20px;">
                <label for="nama_huruf" style="display: block; margin-bottom: 8px; font-weight: 600;">Karakter Huruf</label>
                <input type="text" name="nama_huruf" id="nama_huruf" 
                    class="form-input" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;" 
                    placeholder="Contoh: A" value="{{ old('nama_huruf') }}" maxlength="1" required>
                @error('nama_huruf')
                    <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="kalimat" style="display: block; margin-bottom: 8px; font-weight: 600;">Contoh Kalimat</label>
                <textarea name="kalimat" id="kalimat" rows="5" 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; font-family: inherit;"
                    placeholder="Tuliskan kalimat contoh untuk huruf ini..." required>{{ old('kalimat') }}</textarea>
                @error('kalimat')
                    <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-primary" style="flex: 1;">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('huruf.index') }}" class="btn" style="background-color: #6c757d; color: white;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
