@extends('layouts.guru')
@section('content')
<h4>{{ $item->exists ? 'Edit' : 'Tambah' }} Nilai</h4>
<form method="POST" action="{{ $action }}" class="bg-white p-3 rounded border">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-2"><label>Siswa</label><select name="siswa_id" class="form-select" required><option value="">- Pilih -</option>@foreach($siswas as $s)<option value="{{ $s->id }}" @selected(old('siswa_id',$item->siswa_id)==$s->id)>{{ $s->nama_lengkap }}</option>@endforeach</select></div>
<div class="mb-2"><label>Mapel</label><select name="mata_pelajaran_id" class="form-select" required><option value="">- Pilih -</option>@foreach($mapels as $m)<option value="{{ $m->id }}" @selected(old('mata_pelajaran_id',$item->mata_pelajaran_id)==$m->id)>{{ $m->nama }}</option>@endforeach</select></div>
<div class="mb-2"><label>Nilai Angka</label><input name="nilai_angka" type="number" min="0" max="100" value="{{ old('nilai_angka',$item->nilai_angka) }}" class="form-control" required></div>
<div class="mb-2"><label>Semester</label><select name="semester" class="form-select"><option value="ganjil" @selected(old('semester',$item->semester)=='ganjil')>ganjil</option><option value="genap" @selected(old('semester',$item->semester)=='genap')>genap</option></select></div>
<button class="btn btn-primary mt-3">Simpan</button>
<a href="{{ route('guru.nilai.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
