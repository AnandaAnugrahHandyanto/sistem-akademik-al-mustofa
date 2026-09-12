@extends('layouts.siswa')
@section('content')
<h4>Nilai Saya</h4>
<table class="table table-bordered bg-white">
<thead><tr><th>Mapel</th><th>Angka</th><th>Huruf</th><th>Semester</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->mataPelajaran->nama }}</td><td>{{ $r->nilai_angka }}</td><td><span class="badge bg-success">{{ $r->nilai_huruf }}</span></td><td>{{ $r->semester }}</td></tr>
@empty<tr><td colspan="4" class="text-center text-muted">Belum ada nilai</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
