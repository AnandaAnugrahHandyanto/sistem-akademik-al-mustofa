@extends('layouts.siswa')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">Karakter Saya</h4>
<div class="card"><div class="card-body p-0"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3">Aspek</th><th>Nilai</th><th>Tanggal</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3"><span class="badge bg-light text-dark border">{{ $r->aspek }}</span></td><td><span class="badge bg-{{ $r->nilai=='A'?'success':($r->nilai=='B'?'primary':($r->nilai=='C'?'warning text-dark':'danger')) }}">{{ $r->nilai }}</span></td><td class="small text-muted">{{ $r->tanggal }}</td></tr>
@empty<tr><td colspan="3" class="text-center text-muted py-4">Belum ada penilaian karakter</td></tr>@endforelse
</tbody></table>
</div></div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
