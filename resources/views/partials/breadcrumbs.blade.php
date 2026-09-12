@php
$route = Route::currentRouteName();
$crumbs = [];
$crumbs[] = ['label' => 'Home', 'url' => route('dashboard')];
if ($route) {
    if (str_starts_with($route, 'admin.siswa')) {
        $crumbs[] = ['label' => 'Siswa', 'url' => route('admin.siswa.index')];
        if (str_ends_with($route, '.create')) $crumbs[] = ['label' => 'Tambah', 'url' => null];
        elseif (str_ends_with($route, '.edit')) $crumbs[] = ['label' => 'Edit', 'url' => null];
    } elseif (str_starts_with($route, 'admin.guru')) {
        $crumbs[] = ['label' => 'Guru', 'url' => route('admin.guru.index')];
        if (str_ends_with($route, '.create')) $crumbs[] = ['label' => 'Tambah', 'url' => null];
        elseif (str_ends_with($route, '.edit')) $crumbs[] = ['label' => 'Edit', 'url' => null];
    } elseif (str_starts_with($route, 'admin.kelas')) {
        $crumbs[] = ['label' => 'Kelas', 'url' => route('admin.kelas.index')];
        if (str_ends_with($route, '.create')) $crumbs[] = ['label' => 'Tambah', 'url' => null];
        elseif (str_ends_with($route, '.edit')) $crumbs[] = ['label' => 'Edit', 'url' => null];
    } elseif (str_starts_with($route, 'admin.mapel')) {
        $crumbs[] = ['label' => 'Mata Pelajaran', 'url' => route('admin.mapel.index')];
        if (str_ends_with($route, '.create')) $crumbs[] = ['label' => 'Tambah', 'url' => null];
        elseif (str_ends_with($route, '.edit')) $crumbs[] = ['label' => 'Edit', 'url' => null];
    } elseif (str_starts_with($route, 'admin.user')) {
        $crumbs[] = ['label' => 'User', 'url' => route('admin.user.index')];
        if (str_ends_with($route, '.create')) $crumbs[] = ['label' => 'Tambah', 'url' => null];
        elseif (str_ends_with($route, '.edit')) $crumbs[] = ['label' => 'Edit', 'url' => null];
    } elseif (str_starts_with($route, 'guru.nilai')) {
        $crumbs[] = ['label' => 'Nilai', 'url' => route('guru.nilai.index')];
        if (str_ends_with($route, '.create')) $crumbs[] = ['label' => 'Input', 'url' => null];
        elseif (str_ends_with($route, '.edit')) $crumbs[] = ['label' => 'Edit', 'url' => null];
    } elseif (str_starts_with($route, 'guru.hafalan')) {
        $crumbs[] = ['label' => 'Hafalan', 'url' => route('guru.hafalan.index')];
        if (str_ends_with($route, '.create')) $crumbs[] = ['label' => 'Input', 'url' => null];
        elseif (str_ends_with($route, '.edit')) $crumbs[] = ['label' => 'Edit', 'url' => null];
    } elseif (str_starts_with($route, 'guru.karakter')) {
        $crumbs[] = ['label' => 'Karakter', 'url' => route('guru.karakter.index')];
        if (str_ends_with($route, '.create')) $crumbs[] = ['label' => 'Input', 'url' => null];
        elseif (str_ends_with($route, '.edit')) $crumbs[] = ['label' => 'Edit', 'url' => null];
    } elseif ($route === 'ortu.nilai.index') {
        $crumbs[] = ['label' => 'Nilai Anak', 'url' => null];
    } elseif ($route === 'ortu.hafalan.index') {
        $crumbs[] = ['label' => 'Hafalan', 'url' => null];
    } elseif ($route === 'ortu.karakter.index') {
        $crumbs[] = ['label' => 'Karakter', 'url' => null];
    } elseif ($route === 'siswa.nilai.index') {
        $crumbs[] = ['label' => 'Nilai Saya', 'url' => null];
    } elseif ($route === 'siswa.hafalan.index') {
        $crumbs[] = ['label' => 'Hafalan', 'url' => null];
    } elseif ($route === 'siswa.karakter.index') {
        $crumbs[] = ['label' => 'Karakter', 'url' => null];
    }
}
@endphp
<nav aria-label="breadcrumb">
<ol class="breadcrumb mb-3 bg-transparent p-0">
@foreach($crumbs as $i => $c)
    @if($i === count($crumbs)-1 || !$c['url'])
        <li class="breadcrumb-item active" aria-current="page">{{ $c['label'] }}</li>
    @else
        <li class="breadcrumb-item"><a href="{{ $c['url'] }}" class="text-decoration-none">{{ $c['label'] }}</a></li>
    @endif
@endforeach
</ol>
</nav>
