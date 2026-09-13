@extends('layouts.ortu')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">Hafalan Anak</h4>
<div class="card"><div class="card-body p-0"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3 text-nowrap" style="min-width:100px">Jenis</th><th class="text-nowrap" style="min-width:120px">Surat</th><th style="min-width:140px" class="text-nowrap">Progress</th><th class="text-nowrap" style="min-width:110px">Tanggal</th><th class="text-nowrap" style="min-width:80px">Audio</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3"><span class="badge bg-light text-dark border">{{ $r->jenis_hafalan }}</span></td><td>{{ $r->surat }}</td><td><div class="progress" style="height:20px;"><div class="progress-bar {{ $r->progress <= 50 ? 'bg-danger' : ($r->progress <= 80 ? 'bg-warning text-dark' : 'bg-success') }}" role="progressbar" style="width: {{ $r->progress }}%;" aria-valuenow="{{ $r->progress }}" aria-valuemin="0" aria-valuemax="100">{{ $r->progress }}%</div></div></td><td class="small text-muted">{{ $r->tanggal }}</td><td>@if($r->audio)<a href="{{ Storage::url($r->audio) }}" target="_blank" class="btn btn-sm btn-outline-dark"><i class="bi bi-play-circle me-1"></i>Play</a>@else<span class="text-muted">-</span>@endif</td></tr>
@empty<tr><td colspan="5" class="text-center text-muted py-4">Belum ada data hafalan</td></tr>@endforelse
</tbody></table>
</div></div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
