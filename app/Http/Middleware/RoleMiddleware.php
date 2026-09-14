<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware {
    private const ALLOWED = ['admin','guru','ortu','siswa'];
    public function handle(Request $request, Closure $next, string ...$roles): Response {
        if (!Auth::check()) return redirect()->route('login');
        $userRole = Auth::user()->role;
        if (!in_array($userRole, self::ALLOWED, true)) abort(403, 'Role tidak dikenal');
        foreach ($roles as $r) {
            if (!in_array($r, self::ALLOWED, true)) abort(403, "Role middleware tidak valid: $r");
        }
        if (!in_array($userRole, $roles, true)) abort(403, 'Akses ditolak: role '.implode(',', $roles).' required');
        return $next($request);
    }
}
