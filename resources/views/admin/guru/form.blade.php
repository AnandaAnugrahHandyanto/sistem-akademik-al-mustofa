@extends('layouts.admin')
@section('content')
<h4>{{ $item->exists ? 'Edit' : 'Tambah' }} Guru</h4>
<form method="POST" action="{{ $action }}" class="bg-white p-3 rounded border">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-2"><label>NIP</label><input name="nip" value="{{ old('nip',$item->nip) }}" class="form-control" required></div>
<div class="mb-2"><label>Nama Lengkap</label><input name="nama_lengkap" value="{{ old('nama_lengkap',$item->nama_lengkap) }}" class="form-control" required></div>
<div class="mb-2"><label>Email</label><input name="email" value="{{ old('email',$item->email) }}" class="form-control"></div>
<div class="mb-2"><label>No HP</label><input name="no_hp" value="{{ old('no_hp',$item->no_hp) }}" class="form-control"></div>
<button class="btn btn-primary mt-3">Simpan</button>
<a href="{{ route('admin.guru.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
