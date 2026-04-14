@extends('layouts.main')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('huruf.index') }}" style="color: #007bff; text-decoration: none;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('huruf.edit', $data_huruf->id) }}" class="btn btn-warning" style="font-size: 12px;">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>

    <div class="card">
        <div style="background: #f8f9fa; padding: 25px; text-align: center; border-bottom: 1px solid #eee;">
            <div style="font-size: 48px; font-weight: bold; color: #007bff; margin-bottom: 10px;">
                {{ $data_huruf->nama_huruf }}
            </div>
            <h2 style="margin: 0; font-size: 24px;">Huruf {{ $data_huruf->nama_huruf }}</h2>
        </div>

        <div style="padding: 20px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <h4 style="margin-top: 0; color: #666; font-size: 12px; font-weight: 600; text-transform: uppercase; margin-bottom: 10px;">
                        Tanggal Input
                    </h4>
                    <p style="margin: 0; font-weight: 500;">
                        <i class="fas fa-calendar" style="color: #999; margin-right: 8px;"></i>
                        {{ $data_huruf->created_at->format('d M Y') }}
                    </p>
                </div>
                <div>
                    <h4 style="margin-top: 0; color: #666; font-size: 12px; font-weight: 600; text-transform: uppercase; margin-bottom: 10px;">
                        Jumlah Kata
                    </h4>
                    <p style="margin: 0; font-weight: 500;">
                        <span class="badge badge-primary" style="padding: 5px 10px;">{{ $data_huruf->katas->count() }} Kata</span>
                    </p>
                </div>
            </div>

            <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">

            <div style="margin-bottom: 20px;">
                <h4 style="margin-top: 0; color: #666; font-size: 12px; font-weight: 600; text-transform: uppercase; margin-bottom: 10px;">
                    Contoh Kalimat
                </h4>
                <p style="margin: 0; padding: 10px; background: #f9f9f9; border-left: 4px solid #007bff; border-radius: 2px; font-style: italic;">
                    "{{ $data_huruf->kalimat }}"
                </p>
            </div>

            <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">

            <div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <h4 style="margin: 0; color: #666; font-size: 12px; font-weight: 600; text-transform: uppercase;">
                        Daftar Kata
                    </h4>
                    <a href="{{ route('kata.create', $data_huruf->id) }}" class="btn btn-success" style="padding: 8px 12px; font-size: 12px;">
                        <i class="fas fa-plus"></i> Tambah Kata
                    </a>
                </div>
                @if($data_huruf->katas->count() > 0)
                    <div style="display: grid; gap: 10px;">
                        @foreach($data_huruf->katas as $kata)
                            <div style="padding: 10px; background: #f9f9f9; border-radius: 4px; border-left: 4px solid #28a745;">
                                <div style="font-weight: 500;">
                                    <i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>
                                    {{ $kata->kata }}
                                </div>
                                <div style="font-size: 12px; color: #666; margin-top: 5px;">
                                    {{ $kata->deskripsi }}
                                </div>
                                <div style="margin-top: 10px;">
                                    <a href="{{ route('kalimat.index', [$data_huruf->id, $kata->id]) }}" class="btn btn-sm" style="background-color: #17a2b8; color: white; padding: 5px 10px; font-size: 11px;">
                                        <i class="fas fa-list"></i> Lihat Kalimat ({{ $kata->kalimats->count() }})
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div style="text-align: center; padding: 30px; background: #f9f9f9; border-radius: 4px; color: #999;">
                        <i class="fas fa-inbox" style="font-size: 32px; display: block; margin-bottom: 10px;"></i>
                        <p style="margin: 0 0 15px 0;">Belum ada kata untuk huruf ini</p>
                        <a href="{{ route('kata.create', $data_huruf->id) }}" class="btn btn-primary" style="display: inline-block;">
                            <i class="fas fa-plus"></i> Buat Kata Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
