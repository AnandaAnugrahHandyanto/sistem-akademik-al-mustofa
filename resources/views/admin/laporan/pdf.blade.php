<!doctype html>
<html><head><meta charset="utf-8"><style>
body{font-family: DejaVu Sans, sans-serif; font-size:11px; color:#111;}
.header{text-align:center; border-bottom:2px solid #111; padding-bottom:8px; margin-bottom:12px;}
.header h2{margin:0; font-size:16px;}
.header p{margin:0; font-size:11px;}
.table{width:100%; border-collapse:collapse; margin-top:8px;}
.table th{background:#222; color:#fff; padding:6px; font-size:10px; text-align:left;}
.table td{padding:5px 6px; border-bottom:1px solid #ccc; font-size:10px;}
.footer{margin-top:18px; font-size:10px; display:flex; justify-content:space-between;}
.signature{ text-align:center; float:right; width:200px; }
.signature .line{ border-top:1px solid #111; margin-top:60px; padding-top:4px;}
</style></head><body>
<div class="header">
<h2><i>SDIT Al-Mustofa</i></h2>
<p>Laporan {{ ucfirst($jenis) }} @if($filterKelas) — Kelas {{ $filterKelas }} @endif @if($filterSemester) — Semester {{ ucfirst($filterSemester) }} @endif</p>
</div>
@if($jenis==='nilai')
<table class="table"><thead><tr><th>NIS</th><th>Nama</th><th>Kelas</th><th>Mapel</th><th>Nilai</th><th>Semester</th></tr></thead><tbody>
@forelse($data as $r)<tr><td>{{ $r->siswa->nis ?? '-' }}</td><td>{{ $r->siswa->nama_lengkap ?? '-' }}</td><td>{{ $r->siswa->kelas ?? '-' }}</td><td>{{ $r->mataPelajaran->nama ?? '-' }}</td><td>{{ $r->nilai_angka }} ({{ $r->nilai_huruf }})</td><td>{{ $r->semester }}</td></tr>
@empty<tr><td colspan="6" style="text-align:center;">Tidak ada data</td></tr>@endforelse
</tbody></table>
@elseif($jenis==='hafalan')
<table class="table"><thead><tr><th>NIS</th><th>Nama</th><th>Surat</th><th>Progress</th><th>Tanggal</th></tr></thead><tbody>
@forelse($data as $r)<tr><td>{{ $r->siswa->nis ?? '-' }}</td><td>{{ $r->siswa->nama_lengkap ?? '-' }}</td><td>{{ $r->surat ?? $r->jenis_hafalan }}</td><td>{{ $r->progress }}%</td><td>{{ $r->tanggal }}</td></tr>
@empty<tr><td colspan="5" style="text-align:center;">Tidak ada data</td></tr>@endforelse
</tbody></table>
@else
<table class="table"><thead><tr><th>NIS</th><th>Nama</th><th>Aspek</th><th>Nilai</th><th>Tanggal</th></tr></thead><tbody>
@forelse($data as $r)<tr><td>{{ $r->siswa->nis ?? '-' }}</td><td>{{ $r->siswa->nama_lengkap ?? '-' }}</td><td>{{ $r->aspek }}</td><td>{{ $r->nilai }}</td><td>{{ $r->tanggal }}</td></tr>
@empty<tr><td colspan="5" style="text-align:center;">Tidak ada data</td></tr>@endforelse
</tbody></table>
@endif
<div class="footer">
<div>Tanggal Cetak: {{ $tanggal }}</div>
<div class="signature">Kepala Sekolah<br><div class="line">SDIT Al-Mustofa</div></div>
</div>
</body></html>
