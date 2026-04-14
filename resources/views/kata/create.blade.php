@extends('layouts.main')

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 30px 20px;">
    <a href="{{ route('kata.index', $huruf->id) }}" style="display: inline-flex; align-items: center; font-size: 13px; font-weight: 600; color: #888; text-decoration: none; margin-bottom: 25px; text-transform: uppercase;">
        <i class="fas fa-chevron-left" style="margin-right: 8px;"></i> Kembali ke Daftar Kata
    </a>

    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); overflow: hidden; display: flex;">
        
        <!-- Sidebar Kiri -->
        <div style="width: 35%; background: #1a1a2e; padding: 40px; color: white; display: flex; flex-direction: column; justify-content: space-between; min-height: 500px;">
            <div>
                <div style="width: 60px; height: 60px; background: #28a745; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 20px; box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);">
                    <i class="fas fa-plus"></i>
                </div>
                <h2 style="font-size: 32px; font-weight: 900; line-height: 1.3; margin: 0; margin-bottom: 15px;">Kata<br>Baru</h2>
                <p style="color: #aaa; margin: 15px 0 0 0; font-size: 14px; line-height: 1.6;">
                    Menambahkan kata baru untuk huruf <span style="color: #28a745; font-weight: 700;">{{ $huruf->nama_huruf }}</span>.
                </p>
            </div>

            <div style="padding: 20px; background: rgba(255,255,255,0.05); border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                <p style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin: 0 0 12px 0; letter-spacing: 1px;">Target Huruf</p>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="font-size: 36px; font-weight: 900; color: #28a745;">{{ $huruf->nama_huruf }}</div>
                    <div style="width: 2px; height: 30px; background: rgba(255,255,255,0.1);"></div>
                    <div style="font-size: 13px; font-weight: 500; color: #aaa; font-style: italic;">Pustaka Kata</div>
                </div>
            </div>
        </div>

        <!-- Form Kanan -->
        <div style="width: 65%; padding: 40px;">
            <form action="{{ route('kata.store', $huruf->id) }}" method="POST">
                @csrf

                <!-- Field Kata -->
                <div style="margin-bottom: 35px;">
                    <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 12px; letter-spacing: 0.5px;">Kata</label>
                    <input type="text" name="kata" 
                           style="width: 100%; padding: 12px 0; background: transparent; border: none; border-bottom: 2px solid #ddd; font-size: 24px; font-weight: 700; color: #333; outline: none; transition: border-color 0.3s; @error('kata') border-color: #dc3545; @enderror"
                           placeholder="Contoh: Anak"
                           value="{{ old('kata') }}" required
                           onFocus="this.style.borderBottomColor='#28a745'"
                           onBlur="this.style.borderBottomColor='#ddd'">
                    @error('kata')
                        <p style="color: #dc3545; font-size: 12px; font-weight: 600; margin-top: 8px; text-transform: uppercase;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Field Deskripsi -->
                <div style="margin-bottom: 40px;">
                    <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 12px; letter-spacing: 0.5px;">Deskripsi / Penjelasan</label>
                    <textarea name="deskripsi" rows="7" 
                              style="width: 100%; padding: 15px; background: #f9f9f9; border: none; border-radius: 8px; font-family: inherit; font-size: 14px; color: #555; outline: none; resize: vertical; transition: background 0.3s;"
                              placeholder="Tuliskan penjelasan atau makna dari kata ini..."
                              required
                              onFocus="this.style.background='#f0f7ff'"
                              onBlur="this.style.background='#f9f9f9'">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p style="color: #dc3545; font-size: 12px; font-weight: 600; margin-top: 8px; text-transform: uppercase;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 15px; margin-top: 40px;">
                    <a href="{{ route('kata.index', $huruf->id) }}" 
                       style="font-size: 12px; font-weight: 600; text-transform: uppercase; color: #888; text-decoration: none; padding: 10px; transition: color 0.3s;"
                       onMouseOver="this.style.color='#333'"
                       onMouseOut="this.style.color='#888'">
                        Batal
                    </a>
                    <button type="submit" 
                            class="btn btn-success"
                            style="padding: 12px 24px; font-size: 13px; font-weight: 600; text-transform: uppercase;">
                        <i class="fas fa-check"></i> Simpan Kata
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
