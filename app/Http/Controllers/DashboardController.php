<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        return match($role) {
            'admin' => view('dashboard.admin'),
            'guru' => view('dashboard.guru'),
            'ortu' => view('dashboard.ortu'),
            'siswa' => view('dashboard.siswa'),
            default => abort(403),
        };
    }
}
