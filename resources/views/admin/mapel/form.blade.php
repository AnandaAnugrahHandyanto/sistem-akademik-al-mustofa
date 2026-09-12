@extends('layouts.admin')
@section('content')
<h4>{{ $item->exists ? 'Edit' : 'Tambah' }} Mapel</h4>
<form method="POST" action="{{ $action }}" class="bg-white p-3 rounded border">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-2"><label>Nama</label><input name="nama" value="{{ old('nama',$item->nama) }}" class="form-control" required></div>
<div class="mb-2"><label>Guru</label><select name="guru_id" class="form-select"><option value="">- Pilih Guru -</option>@foreach($gurus as $g)<option value="{{ $g->id }}" @selected(old('guru_id',$item->guru_id)==$g->id)>{{ $g->nama_lengkap }}</option>@endforeach</select></div>
<button class="btn btn-primary mt-3">Simpan</button>
<a href="{{ route('admin.mapel.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
