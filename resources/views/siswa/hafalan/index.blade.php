@extends('layouts.siswa')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">Hafalan Saya</h4>
<div class="card"><div class="card-body p-0"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3">Jenis</th><th>Surat</th><th style="min-width:140px">Progress</th><th>Tanggal</th><th>Audio</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3"><span class="badge bg-light text-dark border">{{ $r->jenis_hafalan }}</span></td><td>{{ $r->surat }}</td><td><div class="progress" style="height:18px"><div class="progress-bar" style="background:#7c3aed;" role="progressbar" style="width:{{ $r->progress }}%">{{ $r->progress }}%</div></div></td><td class="small text-muted">{{ $r->tanggal }}</td><td>@if($r->audio)<a href="{{ Storage::url($r->audio) }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="bi bi-play-circle me-1"></i>Play</a>@else<span class="text-muted">-</span>@endif</td></tr>
@empty<tr><td colspan="5" class="text-center text-muted py-4">Belum ada data hafalan</td></tr>@endforelse
</tbody></table>
</div></div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
