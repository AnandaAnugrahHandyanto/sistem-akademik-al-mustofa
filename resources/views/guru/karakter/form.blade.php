@extends('layouts.guru')
@section('content')
<h4>{{ $item->exists ? 'Edit' : 'Tambah' }} Karakter</h4>
<form method="POST" action="{{ $action }}" class="bg-white p-3 rounded border">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-2"><label>Siswa</label><select name="siswa_id" class="form-select" required><option value="">- Pilih -</option>@foreach($siswas as $s)<option value="{{ $s->id }}" @selected(old('siswa_id',$item->siswa_id)==$s->id)>{{ $s->nama_lengkap }} ({{ $s->kelas }})</option>@endforeach</select></div>
<div class="mb-2"><label>Aspek</label><select name="aspek" class="form-select" required>@foreach($aspekList as $a)<option value="{{ $a }}" @selected(old('aspek',$item->aspek)==$a)>{{ $a }}</option>@endforeach</select></div>
<div class="mb-2"><label>Nilai</label><select name="nilai" class="form-select" required><option value="A" @selected(old('nilai',$item->nilai)=='A')>A</option><option value="B" @selected(old('nilai',$item->nilai)=='B')>B</option><option value="C" @selected(old('nilai',$item->nilai)=='C')>C</option><option value="D" @selected(old('nilai',$item->nilai)=='D')>D</option></select></div>
<div class="mb-2"><label>Tanggal</label><input name="tanggal" type="date" value="{{ old('tanggal', $item->tanggal ? \Illuminate\Support\Carbon::parse($item->tanggal)->format('Y-m-d') : date('Y-m-d')) }}" class="form-control" required></div>
<button class="btn btn-primary mt-3">Simpan</button>
<a href="{{ route('guru.karakter.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
