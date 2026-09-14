@extends(auth()->user()->role === 'admin' ? 'layouts.admin' : (auth()->user()->role === 'guru' ? 'layouts.guru' : (auth()->user()->role === 'ortu' ? 'layouts.ortu' : 'layouts.siswa')))
@section('title','Pengaturan - SDIT Al-Mustofa')
@section('content')
<h4 class="fw-bold mb-3"><i class="bi bi-gear"></i> Pengaturan</h4>

@if(session('ok'))
<div class="alert alert-success">{{ session('ok') }}</div>
@endif
@if($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">
@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
</ul>
</div>
@endif

<div class="card mb-4">
<div class="card-header fw-semibold">Section 1: Ubah Kata Sandi</div>
<div class="card-body">
<form method="POST" action="{{ route('settings.password') }}">
@csrf
<div class="mb-3">
<label class="form-label">Password Lama</label>
<input type="password" name="password_lama" class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">Password Baru</label>
<input type="password" name="password_baru" class="form-control" required minlength="8">
<small class="text-muted">Minimal 8 karakter</small>
</div>
<div class="mb-3">
<label class="form-label">Konfirmasi Password Baru</label>
<input type="password" name="konfirmasi_password" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan Password</button>
</form>
</div>
</div>

<div class="card">
<div class="card-header fw-semibold d-flex justify-content-between align-items-center">
<span>Section 2: Sesi Aktif</span>
@if($sessions->count() > 1)
<form method="POST" action="{{ route('settings.sessions.others.destroy') }}" onsubmit="return confirm('Logout semua sesi lain?')">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-outline-danger">Logout dari Semua Sesi Lain</button>
</form>
@endif
</div>
<div class="card-body p-0">
<div class="table-responsive">
<table class="table table-hover mb-0">
<thead>
<tr>
<th class="text-nowrap">Device</th>
<th class="text-nowrap">IP Address</th>
<th class="text-nowrap">Last Activity</th>
<th class="text-nowrap">Aksi</th>
</tr>
</thead>
<tbody>
@forelse($sessions as $s)
<tr class="{{ $s->id === $currentId ? 'table-success' : '' }}">
<td class="text-nowrap">{{ $s->device }} <small class="text-muted d-block" style="font-size:.70rem;max-width:260px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ Str::limit($s->user_agent, 60) }}</small></td>
<td class="text-nowrap">{{ $s->ip_address ?? '-' }}</td>
<td class="text-nowrap">{{ $s->last_human }} @if($s->id === $currentId) <span class="badge bg-success">Sesi Ini</span> @endif</td>
<td class="text-nowrap">
@if($s->id === $currentId)
<span class="text-muted small">Aktif</span>
@else
<form method="POST" action="{{ route('settings.sessions.destroy', $s->id) }}" onsubmit="return confirm('Logout sesi ini?')">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
</form>
@endif
</td>
</tr>
@empty
<tr><td colspan="4" class="text-center text-muted py-3">Tidak ada sesi aktif</td></tr>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
@endsection
