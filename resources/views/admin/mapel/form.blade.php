@extends('layouts.admin')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">{{ $item->exists ? 'Edit' : 'Tambah' }} Mata Pelajaran</h4>
<div class="card"><div class="card-body p-4">
<form method="POST" action="{{ $action }}">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-3"><label class="form-label fw-medium">Nama Mapel <span class="text-danger">*</span></label><input name="nama" value="{{ old('nama',$item->nama) }}" class="form-control" placeholder="Matematika" required></div>
<div class="mb-3"><label class="form-label fw-medium">Guru Pengampu</label><select name="guru_id" class="form-select"><option value="">- Pilih Guru -</option>@foreach($gurus as $g)<option value="{{ $g->id }}" @selected(old('guru_id',$item->guru_id)==$g->id)>{{ $g->nama_lengkap }}</option>@endforeach</select></div>
<div class="d-flex gap-2 mt-4"><button class="btn btn-warning text-white"><i class="bi bi-check-lg me-1"></i> Simpan</button><button type="reset" class="btn btn-light border">Reset</button><a href="{{ route('admin.mapel.index') }}" class="btn btn-outline-secondary ms-auto">Kembali</a></div>
</form>
</div></div>
@endsection
