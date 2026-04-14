@extends('layouts.main')

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 30px 20px;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <a href="{{ route('kalimat.index', [$huruf->id, $kata->id]) }}" style="display: inline-flex; align-items: center; font-size: 13px; font-weight: 600; color: #666; text-decoration: none; text-transform: uppercase;">
            <i class="fas fa-arrow-left" style="margin-right: 8px;"></i> Kembali ke Daftar Kalimat
        </a>
        <span style="padding: 6px 12px; background: #e3f2fd; color: #1976d2; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase;">
            Detail Kalimat
        </span>
    </div>

    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); overflow: hidden;">
        
        <!-- Header -->
        <div style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); padding: 40px; text-align: center; position: relative;">
            <div style="position: relative; z-index: 10;">
                <div style="width: 100px; height: 100px; background: rgba(255,255,255,0.1); border: 2px solid rgba(255,255,255,0.2); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: 900; color: white; margin: 0 auto 20px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); padding: 10px; overflow: hidden;">
                    {{ mb_substr($kalimat->kalimat, 0, 20) }}
                </div>
                <h2 style="color: white; font-size: 24px; font-weight: 900; margin: 0;">{{ $kalimat->kalimat }}</h2>
            </div>
            
            <div style="position: absolute; top: -40px; left: -40px; font-size: 150px; z-index: 1;">
                📝
            </div>
        </div>

        <!-- Content -->
        <div style="padding: 40px; display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            
            <!-- Kolom Kiri: Detail -->
            <div>
                <!-- Penjelasan -->
                <section style="margin-bottom: 30px;">
                    <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 12px; letter-spacing: 0.5px;">
                        <i class="fas fa-book" style="color: #1976d2; margin-right: 8px;"></i> Penjelasan
                    </h4>
                    <p style="font-size: 16px; font-weight: 500; color: #555; line-height: 1.8;">
                        {{ $kalimat->deskripsi }}
                    </p>
                </section>

                <!-- Separator -->
                <div style="height: 1px; background: #eee; margin: 30px 0;"></div>

                <!-- Info Relasi -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin: 30px 0;">
                    <div>
                        <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 8px;">Dari Kata</h4>
                        <p style="font-weight: 600; color: #333;">
                            <i class="fas fa-tag" style="color: #999; margin-right: 8px;"></i>
                            {{ $kata->kata }}
                        </p>
                    </div>
                    <div>
                        <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 8px;">Dari Huruf</h4>
                        <p style="font-weight: 600; color: #333;">
                            <i class="fas fa-font" style="color: #999; margin-right: 8px;"></i>
                            {{ $huruf->nama_huruf }}
                        </p>
                    </div>
                </div>

                <!-- Separator -->
                <div style="height: 1px; background: #eee; margin: 30px 0;"></div>

                <!-- Tanggal -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                    <div>
                        <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 8px;">Tanggal Input</h4>
                        <p style="font-weight: 600; color: #333;">
                            <i class="far fa-calendar-alt" style="color: #999; margin-right: 8px;"></i>
                            {{ $kalimat->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <div>
                        <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 8px;">Terakhir Update</h4>
                        <p style="font-weight: 600; color: #333;">
                            <i class="far fa-clock" style="color: #999; margin-right: 8px;"></i>
                            {{ $kalimat->updated_at->format('H:i') }} WIB
                        </p>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Menu -->
            <div>
                <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 20px;">Menu Kelola</h4>
                
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <a href="{{ route('kalimat.edit', [$huruf->id, $kata->id, $kalimat->id]) }}" 
                       class="btn btn-warning"
                       style="display: flex; align-items: center; justify-content: space-between; padding: 15px 20px; border-radius: 8px; text-decoration: none;">
                        <span><i class="fas fa-edit" style="margin-right: 8px;"></i> Ubah Data</span>
                        <i class="fas fa-chevron-right" style="font-size: 12px;"></i>
                    </a>

                    <form action="{{ route('kalimat.destroy', [$huruf->id, $kata->id, $kalimat->id]) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" 
                                class="btn btn-danger"
                                style="width: 100%; padding: 15px 20px; border-radius: 8px; border: 1px solid #dc3545; background: white; color: #dc3545; cursor: pointer; font-weight: 600;"
                                onMouseOver="this.style.background='#ffebee'"
                                onMouseOut="this.style.background='white'"
                                onclick="return confirm('Hapus data ini secara permanen?')">
                            <i class="fas fa-trash-alt" style="margin-right: 8px;"></i> Hapus Data
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
