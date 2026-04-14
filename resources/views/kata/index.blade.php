@extends('layouts.main')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 30px 20px;">
    
    <div style="margin-bottom: 40px;">
        <a href="{{ route('huruf.index') }}" style="display: inline-flex; align-items: center; font-size: 13px; font-weight: 600; color: #666; text-decoration: none; margin-bottom: 16px; text-transform: uppercase;">
            <i class="fas fa-chevron-left" style="margin-right: 8px;"></i> Kembali ke Dashboard
        </a>
        
        <div style="display: flex; flex-direction: column; gap: 20;">
            <div>
                <span style="display: inline-block; padding: 6px 12px; border-radius: 20px; background: #e3f2fd; color: #1976d2; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 12px;">
                    Daftar Kata
                </span>
                <h1 style="font-size: 36px; font-weight: 900; color: #333; margin: 0; line-height: 1.3;">
                    Kata dari Huruf <span style="background: linear-gradient(135deg, #1976d2 0%, #7b1fa2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">{{ $huruf->nama_huruf }}</span>
                </h1>
            </div>

            <a href="{{ route('kata.create', $huruf->id) }}" 
               style="display: inline-flex; align-items: center; justify-content: center; padding: 12px 24px; background: #28a745; color: white; border-radius: 8px; font-weight: 700; box-shadow: 0 4px 8px rgba(40, 167, 69, 0.2); text-decoration: none; text-transform: uppercase; width: fit-content; transition: background 0.3s;"
               onMouseOver="this.style.background='#218838'"
               onMouseOut="this.style.background='#28a745'">
                <i class="fas fa-plus-circle" style="margin-right: 8px;"></i> Tambah Kata
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="margin-bottom: 30px; padding: 12px 16px; background: #d4edda; border: 1px solid #c3e6cb; color: #155724; border-radius: 8px; display: flex; align-items: center; animation: pulse 2s ease-in-out infinite;">
            <div style="width: 32px; height: 32px; background: #28a745; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px; font-size: 14px; flex-shrink: 0;">
                <i class="fas fa-check"></i>
            </div>
            <span style="font-weight: 600; font-size: 14px;">{{ session('success') }}</span>
        </div>
    @endif

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
        @forelse($katas as $k)
        <div style="background: white; border-radius: 8px; border: 1px solid #eee; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden; transition: all 0.3s; height: fit-content;"
             onMouseOver="this.style.boxShadow='0 8px 16px rgba(0,0,0,0.1)'; this.style.transform='translateY(-2px)'"
             onMouseOut="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.05)'; this.style.transform='translateY(0)'">
            
            <div style="padding: 20px;">
                <div style="display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 16px;">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px; font-weight: 900; box-shadow: 0 4px 8px rgba(40, 167, 69, 0.2);">
                        {{ mb_substr($k->kata, 0, 1) }}
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <a href="{{ route('kata.edit', [$huruf->id, $k->id]) }}" style="padding: 6px; color: #999; text-decoration: none; transition: color 0.3s;"
                           onMouseOver="this.style.color='#ffc107'"
                           onMouseOut="this.style.color='#999'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('kata.destroy', [$huruf->id, $k->id]) }}" method="POST" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus kata ini?')" style="background: none; border: none; padding: 6px; color: #999; cursor: pointer; transition: color 0.3s; font-size: 14px;"
                                    onMouseOver="this.style.color='#dc3545'"
                                    onMouseOut="this.style.color='#999'">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <h3 style="font-size: 18px; font-weight: 700; color: #333; margin: 0 0 8px 0;">{{ $k->kata }}</h3>
                <p style="font-size: 13px; color: #666; line-height: 1.6; margin: 0 0 16px 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                    {{ $k->deskripsi }}
                </p>

                <span style="display: inline-flex; align-items: center; font-size: 12px; font-weight: 600; color: #28a745; background: #e8f5e9; padding: 6px 12px; border-radius: 20px;">
                    <i class="fas fa-book" style="margin-right: 8px;"></i>
                    {{ $k->kalimats->count() }} Kalimat
                </span>
            </div>

            <div style="padding: 12px 20px; background: #f9f9f9; border-top: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                <span style="font-size: 11px; font-weight: 700; color: #1976d2; text-transform: uppercase;">ID: #{{ $k->id }}</span>
                <a href="{{ route('kalimat.index', [$huruf->id, $k->id]) }}" style="font-size: 13px; font-weight: 700; color: #333; text-decoration: none; display: flex; align-items: center;"
                   onMouseOver="this.style.color='#1976d2'"
                   onMouseOut="this.style.color='#333'">
                    Kalimat <i class="fas fa-arrow-right" style="margin-left: 6px; font-size: 11px;"></i>
                </a>
            </div>
        </div>
        @empty
        <div style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;">
            <div style="width: 80px; height: 80px; background: #eee; color: #999; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; font-size: 32px;">
                <i class="fas fa-folder-open"></i>
            </div>
            <h3 style="font-size: 18px; font-weight: 700; color: #333; margin: 0 0 8px 0;">Belum Ada Kata</h3>
            <p style="color: #666; margin: 0;">Mulai tambahkan kata dari huruf ini.</p>
        </div>
        @endforelse
    </div>

    @if($katas->hasPages())
        <div style="margin-top: 40px;">
            {{ $katas->appends(request()->query())->links() }}
        </div>
    @endif
</div>

<style>
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }
</style>
@endsection
