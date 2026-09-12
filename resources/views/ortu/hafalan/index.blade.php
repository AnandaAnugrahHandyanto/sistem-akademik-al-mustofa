@extends('layouts.ortu')
@section('content')
<h4>Hafalan Anak</h4>
<table class="table table-bordered bg-white">
<thead><tr><th>Jenis</th><th>Surat</th><th>Progress</th><th>Tanggal</th><th>Audio</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->jenis_hafalan }}</td><td>{{ $r->surat }}</td><td><div class="progress" style="height:16px"><div class="progress-bar bg-success" style="width:{{ $r->progress }}%">{{ $r->progress }}%</div></div></td><td>{{ $r->tanggal }}</td><td>@if($r->audio)<a href="{{ Storage::url($r->audio) }}" target="_blank" class="btn btn-sm btn-outline-success">Play</a>@else<span class="text-muted">-</span>@endif</td></tr>
@empty<tr><td colspan="5" class="text-center text-muted">Belum ada hafalan</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
