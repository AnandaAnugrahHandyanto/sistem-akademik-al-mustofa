@extends('layouts.admin')
@section('content')
<h4>{{ $item->exists ? 'Edit' : 'Tambah' }} Kelas</h4>
<form method="POST" action="{{ $action }}" class="bg-white p-3 rounded border">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-2"><label>Nama Kelas</label><input name="nama_kelas" value="{{ old('nama_kelas',$item->nama_kelas) }}" class="form-control" required></div>
<div class="mb-2"><label>Tingkat</label><input name="tingkat" value="{{ old('tingkat',$item->tingkat) }}" class="form-control" required></div>
<div class="mb-2"><label>Rombel</label><input name="rombel" value="{{ old('rombel',$item->rombel) }}" class="form-control" required></div>
<button class="btn btn-primary mt-3">Simpan</button>
<a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
