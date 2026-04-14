@extends('layouts.main')

@section('content')
<div style="max-width: 1000px; margin: 0 auto; padding: 30px 20px;">
    
    <!-- Header -->
    <div style="margin-bottom: 30px;">
        <a href="{{ route('kata.index', $huruf->id) }}" style="display: inline-flex; align-items: center; font-size: 13px; font-weight: 600; color: #666; text-decoration: none; margin-bottom: 12px; text-transform: uppercase;">
            <i class="fas fa-chevron-left" style="margin-right: 8px;"></i> Kembali ke Daftar Kata
        </a>
        
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
            <div>
                <h2 style="font-size: 24px; font-weight: 700; color: #333; margin: 0;">
                    Kalimat: {{ $kata->kata }}
                </h2>
                <p style="font-size: 13px; color: #999; margin: 5px 0 0 0;">Huruf {{ $huruf->nama_huruf }} • Total: {{ $kalimats->count() }} kalimat</p>
            </div>
            <a href="{{ route('kalimat.create', [$huruf->id, $kata->id]) }}" 
               class="btn btn-success"
               style="padding: 10px 16px; font-size: 12px; text-transform: uppercase; white-space: nowrap;">
                <i class="fas fa-plus"></i> Tambah Kalimat
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div style="margin-bottom: 20px; padding: 12px 16px; background: #d4edda; border-left: 4px solid #28a745; color: #155724; border-radius: 4px; font-size: 13px; font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div style="background: white; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f9f9f9; border-bottom: 1px solid #ddd;">
                    <th style="padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase; width: 5%;">No</th>
                    <th style="padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase; width: 50%;">Kalimat</th>
                    <th style="padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase; width: 35%;">Deskripsi</th>
                    <th style="padding: 12px 16px; text-align: center; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase; width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kalimats as $k)
                <tr style="border-bottom: 1px solid #eee; transition: background 0.2s;">
                    <td style="padding: 12px 16px; font-size: 13px; color: #666;">{{ $loop->iteration }}</td>
                    <td style="padding: 12px 16px; font-size: 14px; font-weight: 500; color: #333;">{{ $k->kalimat }}</td>
                    <td style="padding: 12px 16px; font-size: 13px; color: #666; max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $k->deskripsi }}</td>
                    <td style="padding: 12px 16px; text-align: center; display: flex; gap: 8px; justify-content: center;">
                        <a href="{{ route('kalimat.edit', [$huruf->id, $kata->id, $k->id]) }}" 
                           class="btn btn-sm"
                           style="background-color: #ffc107; color: #333; padding: 6px 10px; font-size: 11px; text-decoration: none; border-radius: 3px;">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('kalimat.destroy', [$huruf->id, $kata->id, $k->id]) }}" method="POST" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-danger"
                                    style="padding: 6px 10px; font-size: 11px; background-color: #dc3545; color: white; border: none; border-radius: 3px; cursor: pointer;"
                                    onclick="return confirm('Hapus kalimat ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 40px 16px; text-align: center; color: #999;">
                        <i class="fas fa-inbox" style="font-size: 32px; display: block; margin-bottom: 12px; opacity: 0.5;"></i>
                        <p style="margin: 0;">Belum ada kalimat. Klik "Tambah Kalimat" untuk memulai.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($kalimats->hasPages())
        <div style="margin-top: 20px;">
            {{ $kalimats->appends(request()->query())->links() }}
        </div>
    @endif
</div>
@endsection
