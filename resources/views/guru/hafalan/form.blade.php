@extends('layouts.guru')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">{{ $item->exists ? 'Edit' : 'Tambah' }} Hafalan</h4>
<div class="card"><div class="card-body p-4">
<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-3"><label class="form-label fw-medium">Siswa <span class="text-danger">*</span></label><select name="siswa_id" class="form-select" required><option value="">- Pilih Siswa -</option>@foreach($siswas as $s)<option value="{{ $s->id }}" @selected(old('siswa_id',$item->siswa_id)==$s->id)>{{ $s->nama_lengkap }} ({{ $s->kelas }})</option>@endforeach</select></div>
<div class="mb-3"><label class="form-label fw-medium">Jenis Hafalan <span class="text-danger">*</span></label><select name="jenis_hafalan" class="form-select" required><option value="surat_pendek" @selected(old('jenis_hafalan',$item->jenis_hafalan)=='surat_pendek')>Surat Pendek</option><option value="doa" @selected(old('jenis_hafalan',$item->jenis_hafalan)=='doa')>Doa</option><option value="hadis" @selected(old('jenis_hafalan',$item->jenis_hafalan)=='hadis')>Hadis</option></select></div>
<div class="mb-3"><label class="form-label fw-medium">Surat / Judul <span class="text-danger">*</span></label><input name="surat" value="{{ old('surat',$item->surat) }}" class="form-control" placeholder="Contoh: An-Nas" required></div>
<div class="row g-3">
<div class="col-md-4 mb-3"><label class="form-label fw-medium">Ayat Mulai</label><input id="ayat_mulai" name="ayat_mulai" type="number" min="1" value="{{ old('ayat_mulai',$item->ayat_mulai) }}" class="form-control" placeholder="1"></div>
<div class="col-md-4 mb-3"><label class="form-label fw-medium">Ayat Selesai</label><input id="ayat_selesai" name="ayat_selesai" type="number" min="1" value="{{ old('ayat_selesai',$item->ayat_selesai) }}" class="form-control" placeholder="3"></div>
<div class="col-md-4 mb-3"><label class="form-label fw-medium">Total Ayat</label><input id="total_ayat" name="total_ayat" type="number" min="1" value="{{ old('total_ayat',$item->total_ayat) }}" class="form-control" placeholder="6"></div>
</div>
<div class="row g-3">
<div class="col-md-6 mb-3"><label class="form-label fw-medium">Progress (0-100) <span class="text-danger">*</span></label><input id="progress" name="progress" type="number" min="0" max="100" value="{{ old('progress',$item->progress ?? 0) }}" class="form-control" placeholder="0" required><small class="text-muted">Auto-calculate dari ayat jika terisi</small></div>
<div class="col-md-6 mb-3"><label class="form-label fw-medium">Status</label><select name="status" class="form-select"><option value="baru" @selected(old('status',$item->status ?? 'baru')=='baru')>Baru</option><option value="ulang" @selected(old('status',$item->status)=='ulang')>Ulang</option><option value="lulus" @selected(old('status',$item->status)=='lulus')>Lulus</option></select></div>
</div>
<div class="mb-3"><label class="form-label fw-medium">Tanggal <span class="text-danger">*</span></label><input name="tanggal" type="date" value="{{ old('tanggal', $item->tanggal ? \Illuminate\Support\Carbon::parse($item->tanggal)->format('Y-m-d') : date('Y-m-d')) }}" class="form-control" required></div>
<div class="mb-3"><label class="form-label fw-medium">Audio (opsional)</label><input name="audio" type="file" class="form-control" accept=".mp3,.wav,.m4a,.ogg"><small class="text-muted">mp3/wav/m4a/ogg max 5MB</small>@if($item->audio)<div class="mt-1"><small class="text-muted">Existing: <a href="{{ Storage::url($item->audio) }}" target="_blank"><i class="bi bi-play-circle"></i> play</a> - upload baru akan replace</small></div>@endif</div>
<div class="d-flex gap-2 mt-4"><button class="btn btn-success"><i class="bi bi-check-lg me-1"></i> Simpan</button><button type="reset" class="btn btn-light border">Reset</button><a href="{{ route('guru.hafalan.index') }}" class="btn btn-outline-secondary ms-auto">Kembali</a></div>
</form>
</div></div>
<script>
(function(){
  const a=document.getElementById('ayat_mulai'), b=document.getElementById('ayat_selesai'), t=document.getElementById('total_ayat'), p=document.getElementById('progress');
  function calc(){ const av=parseInt(a.value), bv=parseInt(b.value), tv=parseInt(t.value); if(av&&bv&&tv&&tv>0&&bv>=av){ const n=bv-av+1; p.value=Math.min(100, Math.round(n/tv*100)); } }
  [a,b,t].forEach(el=>el&&el.addEventListener('input',calc));
})();
</script>
@endsection
