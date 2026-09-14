<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        $sessions = DB::table('sessions')
            ->where('user_id', Auth::id())
            ->orderByDesc('last_activity')
            ->get()
            ->map(function($s) {
                $s->last_human = Carbon::createFromTimestamp($s->last_activity)->diffForHumans();
                $s->device = $this->parseDevice($s->user_agent ?? '');
                return $s;
            });
        $currentId = $request->session()->getId();
        return view('settings.index', compact('sessions','currentId'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => ['required'],
            'password_baru' => ['required','min:8'],
            'konfirmasi_password' => ['required','same:password_baru'],
        ],[
            'password_lama.required' => 'Password lama wajib diisi',
            'password_baru.required' => 'Password baru wajib diisi',
            'password_baru.min' => 'Password baru minimal 8 karakter',
            'konfirmasi_password.required' => 'Konfirmasi wajib diisi',
            'konfirmasi_password.same' => 'Konfirmasi tidak sama dengan password baru',
        ]);

        if (!Hash::check($request->password_lama, Auth::user()->password)) {
            return back()->withErrors(['password_lama' => 'Password lama salah'])->withInput();
        }

        $user = Auth::user();
        $user->password = Hash::make($request->password_baru);
        $user->save();

        return back()->with('ok','Password berhasil diubah');
    }

    public function destroySession(Request $request, $id)
    {
        $current = $request->session()->getId();
        if ($id === $current) {
            return back()->withErrors(['session' => 'Tidak bisa logout sesi yang sedang aktif. Gunakan tombol Logout.']);
        }
        DB::table('sessions')->where('id',$id)->where('user_id', Auth::id())->delete();
        return back()->with('ok','Sesi berhasil di-logout');
    }

    public function destroyOtherSessions(Request $request)
    {
        $current = $request->session()->getId();
        DB::table('sessions')->where('user_id', Auth::id())->where('id','!=',$current)->delete();
        return back()->with('ok','Semua sesi lain berhasil di-logout');
    }

    private function parseDevice($ua)
    {
        if (!$ua) return 'Unknown';
        $ua = strtolower($ua);
        $os = 'Unknown OS';
        if (str_contains($ua,'windows')) $os='Windows';
        elseif (str_contains($ua,'mac')) $os='macOS';
        elseif (str_contains($ua,'android')) $os='Android';
        elseif (str_contains($ua,'iphone')||str_contains($ua,'ipad')) $os='iOS';
        elseif (str_contains($ua,'linux')) $os='Linux';
        $browser='Unknown';
        if (str_contains($ua,'edg')) $browser='Edge';
        elseif (str_contains($ua,'chrome')) $browser='Chrome';
        elseif (str_contains($ua,'safari')) $browser='Safari';
        elseif (str_contains($ua,'firefox')) $browser='Firefox';
        return "$browser ($os)";
    }
}
