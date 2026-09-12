@extends('layouts.guru')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">{{ $item->exists ? 'Edit' : 'Tambah' }} Karakter</h4>
<div class="card"><div class="card-body p-4">
<form method="POST" action="{{ $action }}">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-3"><label class="form-label fw-medium">Siswa <span class="text-danger">*</span></label><select name="siswa_id" class="form-select" required><option value="">- Pilih Siswa -</option>@foreach($siswas as $s)<option value="{{ $s->id }}" @selected(old('siswa_id',$item->siswa_id)==$s->id)>{{ $s->nama_lengkap }} ({{ $s->kelas }})</option>@endforeach</select></div>
<div class="mb-3"><label class="form-label fw-medium">Aspek <span class="text-danger">*</span></label><select name="aspek" class="form-select" required>@foreach($aspekList as $a)<option value="{{ $a }}" @selected(old('aspek',$item->aspek)==$a)>{{ $a }}</option>@endforeach</select></div>
<div class="mb-3"><label class="form-label fw-medium">Nilai <span class="text-danger">*</span></label><select name="nilai" class="form-select" required><option value="A" @selected(old('nilai',$item->nilai)=='A')>A - Sangat Baik</option><option value="B" @selected(old('nilai',$item->nilai)=='B')>B - Baik</option><option value="C" @selected(old('nilai',$item->nilai)=='C')>C - Cukup</option><option value="D" @selected(old('nilai',$item->nilai)=='D')>D - Perlu Bimbingan</option></select></div>
<div class="mb-3"><label class="form-label fw-medium">Tanggal <span class="text-danger">*</span></label><input name="tanggal" type="date" value="{{ old('tanggal', $item->tanggal ? \Illuminate\Support\Carbon::parse($item->tanggal)->format('Y-m-d') : date('Y-m-d')) }}" class="form-control" required></div>
<div class="d-flex gap-2 mt-4"><button class="btn btn-success"><i class="bi bi-check-lg me-1"></i> Simpan</button><button type="reset" class="btn btn-light border">Reset</button><a href="{{ route('guru.karakter.index') }}" class="btn btn-outline-secondary ms-auto">Kembali</a></div>
</form>
</div></div>
@endsection
