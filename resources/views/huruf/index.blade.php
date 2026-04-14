@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Daftar Huruf</h2>
        <a href="{{ route('huruf.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Huruf
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">Huruf</th>
                <th style="width: 30%">Contoh Kata</th>
                <th style="width: 35%">Contoh Kalimat</th>
                <th style="width: 15%; text-align: center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($huruf as $h)
            <tr>
                <td>{{ ($huruf->currentPage()-1) * $huruf->perPage() + $loop->iteration }}</td>
                <td>
                    <span class="badge badge-primary" style="font-size: 16px; padding: 8px 12px;">
                        {{ $h->nama_huruf }}
                    </span>
                </td>
                <td>
                    @if($h->katas->count() > 0)
                    <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                        @foreach($h->katas->take(2) as $k)
                            <span class="badge" style="background-color: #e9ecef; color: #495057; margin-bottom: 3px;">{{ $k->kata }}</span>
                        @endforeach
                        @if($h->katas->count() > 2)
                            <span class="badge" style="background-color: #e9ecef; color: #495057; margin-bottom: 3px;">+{{ $h->katas->count() - 2 }} lagi</span>
                        @endif
                        <a href="{{ route('kata.index', $h->id) }}" class="btn btn-sm" style="background-color: #17a2b8; color: white; white-space: nowrap; padding: 4px 8px; font-size: 11px; margin-bottom: 3px;">
                            <i class="fas fa-list"></i> Lihat Semua
                        </a>
                    </div>
                    @else
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #999; font-style: italic;">Belum ada kata</span>
                        <a href="{{ route('kata.create', $h->id) }}" class="btn btn-sm btn-success" style="padding: 4px 8px; font-size: 11px; white-space: nowrap;">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    </div>
                    @endif
                </td>
                <td>{{ $h->kalimat }}</td>
                <td style="text-align: center; display: flex; gap: 5px; justify-content: center;">
                    <a href="{{ route('huruf.show', $h->id) }}" class="btn btn-sm" style="background-color: #17a2b8; color: white;">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                    <a href="{{ route('huruf.edit', $h->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('huruf.destroy', $h->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 40px; color: #999;">
                    <i class="fas fa-inbox" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
                    Data tidak ditemukan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $huruf->links() }}
</div>
@endsection
