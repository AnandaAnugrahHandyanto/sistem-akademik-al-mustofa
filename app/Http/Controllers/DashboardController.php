<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return match (Auth::user()->role) {
            'admin' => redirect()->route('admin.siswa.index'),
            'guru'  => redirect()->route('guru.nilai.index'),
            'ortu'  => redirect()->route('ortu.nilai.index'),
            'siswa' => redirect()->route('siswa.nilai.index'),
            default => abort(403),
        };
    }
}
