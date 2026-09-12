@extends('layouts.siswa')
@section('content')
<h4>Karakter Saya</h4>
<table class="table table-bordered bg-white">
<thead><tr><th>Aspek</th><th>Nilai</th><th>Tanggal</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->aspek }}</td><td><span class="badge bg-{{ $r->nilai=='A'?'success':($r->nilai=='B'?'primary':($r->nilai=='C'?'warning':'danger')) }}">{{ $r->nilai }}</span></td><td>{{ $r->tanggal }}</td></tr>
@empty<tr><td colspan="3" class="text-center text-muted">Belum ada penilaian karakter</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
