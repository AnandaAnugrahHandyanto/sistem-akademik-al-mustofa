@extends('layouts.admin')
@section('content')
<h4>{{ $item->exists ? 'Edit' : 'Tambah' }} Siswa</h4>
<form method="POST" action="{{ $action }}" class="bg-white p-3 rounded border">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-2"><label>NIS</label><input name="nis" value="{{ old('nis',$item->nis) }}" class="form-control" required></div>
<div class="mb-2"><label>Nama Lengkap</label><input name="nama_lengkap" value="{{ old('nama_lengkap',$item->nama_lengkap) }}" class="form-control" required></div>
<div class="row"><div class="col"><label>Kelas</label><input name="kelas" value="{{ old('kelas',$item->kelas) }}" class="form-control" required></div>
<div class="col"><label>Rombel</label><input name="rombel" value="{{ old('rombel',$item->rombel) }}" class="form-control" required></div>
<div class="col"><label>JK</label><select name="jenis_kelamin" class="form-select"><option value="L" @selected(old('jenis_kelamin',$item->jenis_kelamin)=='L')>L</option><option value="P" @selected(old('jenis_kelamin',$item->jenis_kelamin)=='P')>P</option></select></div></div>
<button class="btn btn-primary mt-3">Simpan</button>
<a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
