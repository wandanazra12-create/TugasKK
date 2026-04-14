@extends('layouts.main')

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 30px 20px;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <a href="{{ route('kata.index', $huruf->id) }}" style="display: inline-flex; align-items: center; font-size: 13px; font-weight: 600; color: #666; text-decoration: none; text-transform: uppercase;">
            <i class="fas fa-arrow-left" style="margin-right: 8px;"></i> Kembali ke Daftar Kata
        </a>
        <span style="padding: 6px 12px; background: #e3f2fd; color: #1976d2; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase;">
            Detail Kata
        </span>
    </div>

    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); overflow: hidden;">
        
        <!-- Header -->
        <div style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); padding: 40px; text-align: center; position: relative;">
            <div style="position: relative; z-index: 10;">
                <div style="width: 80px; height: 80px; background: rgba(255,255,255,0.1); border: 2px solid rgba(255,255,255,0.2); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 40px; font-weight: 900; color: white; margin: 0 auto 20px; box-shadow: 0 8px 16px rgba(0,0,0,0.2);">
                    {{ mb_substr($kata->kata, 0, 1) }}
                </div>
                <h2 style="color: white; font-size: 28px; font-weight: 900; text-transform: uppercase; margin: 0;">{{ $kata->kata }}</h2>
            </div>
            
            <div style="position: absolute; top: -40px; left: -40px; font-size: 200px; font-weight: 900; color: rgba(255,255,255,0.05); z-index: 1; text-transform: uppercase; line-height: 1; pointer-events: none;">
                {{ mb_substr($kata->kata, 0, 1) }}
            </div>
        </div>

        <!-- Content -->
        <div style="padding: 40px; display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            
            <!-- Kolom Kiri: Detail -->
            <div>
                <!-- Deskripsi -->
                <section style="margin-bottom: 30px;">
                    <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 12px; letter-spacing: 0.5px;">
                        <i class="fas fa-tag" style="color: #1976d2; margin-right: 8px;"></i> Deskripsi
                    </h4>
                    <p style="font-size: 16px; font-weight: 500; color: #555; line-height: 1.8;">
                        {{ $kata->deskripsi }}
                    </p>
                </section>

                <!-- Separator -->
                <div style="height: 1px; background: #eee; margin: 30px 0;"></div>

                <!-- Tanggal -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin: 30px 0;">
                    <div>
                        <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 8px;">Tanggal Input</h4>
                        <p style="font-weight: 600; color: #333;">
                            <i class="far fa-calendar-alt" style="color: #999; margin-right: 8px;"></i>
                            {{ $kata->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <div>
                        <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 8px;">Terakhir Update</h4>
                        <p style="font-weight: 600; color: #333;">
                            <i class="far fa-clock" style="color: #999; margin-right: 8px;"></i>
                            {{ $kata->updated_at->format('H:i') }} WIB
                        </p>
                    </div>
                </div>

                <!-- Separator -->
                <div style="height: 1px; background: #eee; margin: 30px 0;"></div>

                <!-- Kalimat -->
                <section>
                    <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 16px; letter-spacing: 0.5px;">
                        <i class="fas fa-book" style="color: #1976d2; margin-right: 8px;"></i> Kalimat ({{ $kata->kalimats->count() }})
                    </h4>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        @forelse($kata->kalimats as $k)
                            <div style="background: #f9f9f9; border-radius: 8px; padding: 15px; border: 1px solid #eee;">
                                <p style="font-weight: 600; color: #333; margin: 0 0 8px 0;">{{ $k->kalimat }}</p>
                                <p style="font-size: 13px; color: #666; margin: 0;">{{ $k->deskripsi }}</p>
                            </div>
                        @empty
                            <p style="color: #999; font-style: italic;">Belum ada kalimat untuk kata ini.</p>
                        @endforelse
                    </div>
                </section>
            </div>

            <!-- Kolom Kanan: Menu -->
            <div>
                <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #666; margin-bottom: 20px;">Menu Kelola</h4>
                
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <a href="{{ route('kalimat.index', [$huruf->id, $kata->id]) }}" 
                       class="btn btn-primary"
                       style="display: flex; align-items: center; justify-content: space-between; padding: 15px 20px; border-radius: 8px; text-decoration: none;">
                        <span><i class="fas fa-book-open" style="margin-right: 8px;"></i> Kalimat</span>
                        <i class="fas fa-chevron-right" style="font-size: 12px;"></i>
                    </a>

                    <a href="{{ route('kata.edit', [$huruf->id, $kata->id]) }}" 
                       class="btn btn-warning"
                       style="display: flex; align-items: center; justify-content: space-between; padding: 15px 20px; border-radius: 8px; text-decoration: none;">
                        <span><i class="fas fa-edit" style="margin-right: 8px;"></i> Ubah Data</span>
                        <i class="fas fa-chevron-right" style="font-size: 12px;"></i>
                    </a>

                    <form action="{{ route('kata.destroy', [$huruf->id, $kata->id]) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" 
                                class="btn btn-danger"
                                style="width: 100%; padding: 15px 20px; border-radius: 8px; border: 1px solid #dc3545; background: white; color: #dc3545; cursor: pointer; font-weight: 600; margin-top: 8px;"
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
