<?php

namespace Database\Seeders;

use App\Models\CatatanGuru;
use App\Models\Guru;
use App\Models\Hafalan;
use App\Models\Karakter;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Kelas
        $k1a = Kelas::create(['nama_kelas' => '1A', 'tingkat' => '1', 'rombel' => 'A']);
        Kelas::create(['nama_kelas' => '1B', 'tingkat' => '1', 'rombel' => 'B']);

        // Guru
        $g1 = Guru::create(['nip' => '19800101', 'nama_lengkap' => 'Ust. Budi', 'email' => 'budi@almustofa.sch.id', 'no_hp' => '0811111111']);
        $g2 = Guru::create(['nip' => '19800202', 'nama_lengkap' => 'Ust. Ahmad', 'email' => 'ahmad@almustofa.sch.id', 'no_hp' => '0822222222']);

        // Mapel
        $m1 = MataPelajaran::create(['nama' => 'Matematika', 'guru_id' => $g1->id]);
        $m2 = MataPelajaran::create(['nama' => 'B. Arab', 'guru_id' => $g2->id]);

        // Siswa
        $s1 = Siswa::create(['nis' => '12345', 'nama_lengkap' => 'Ahmad Fauzi', 'kelas' => '1A', 'rombel' => 'A', 'jenis_kelamin' => 'L']);
        $s2 = Siswa::create(['nis' => '12346', 'nama_lengkap' => 'Fatimah Zahra', 'kelas' => '1A', 'rombel' => 'A', 'jenis_kelamin' => 'P']);
        $s3 = Siswa::create(['nis' => '12347', 'nama_lengkap' => 'Umar Faruq', 'kelas' => '1B', 'rombel' => 'B', 'jenis_kelamin' => 'L']);

        // Users multi-role
        User::create(['name' => 'Admin', 'username' => 'admin', 'email' => 'admin@almustofa.sch.id', 'password' => Hash::make('admin123'), 'role' => 'admin']);
        User::create(['name' => 'Ust. Budi', 'username' => 'guru', 'email' => 'guru@almustofa.sch.id', 'password' => Hash::make('guru123'), 'role' => 'guru', 'guru_id' => $g1->id]);
        User::create(['name' => 'Ust. Ahmad', 'username' => 'guru2', 'email' => 'guru2@almustofa.sch.id', 'password' => Hash::make('guru123'), 'role' => 'guru', 'guru_id' => $g2->id]);
        User::create(['name' => 'Ortu Ahmad', 'username' => 'ortu', 'email' => 'ortu@almustofa.sch.id', 'password' => Hash::make('ortu123'), 'role' => 'ortu', 'siswa_id' => $s1->id]);
        User::create(['name' => 'Ahmad Fauzi', 'username' => 'siswa', 'email' => 'siswa@almustofa.sch.id', 'password' => Hash::make('siswa123'), 'role' => 'siswa', 'siswa_id' => $s1->id]);

        // Nilai dummy
        Nilai::create(['siswa_id' => $s1->id, 'mata_pelajaran_id' => $m1->id, 'nilai_angka' => 85, 'semester' => 'ganjil']);
        Nilai::create(['siswa_id' => $s1->id, 'mata_pelajaran_id' => $m2->id, 'nilai_angka' => 90, 'semester' => 'ganjil']);
        Nilai::create(['siswa_id' => $s2->id, 'mata_pelajaran_id' => $m1->id, 'nilai_angka' => 78, 'semester' => 'ganjil']);

        // Hafalan
        Hafalan::create(['siswa_id' => $s1->id, 'jenis_hafalan' => 'surat_pendek', 'surat' => 'An-Nas', 'progress' => 100, 'tanggal' => now()]);
        Hafalan::create(['siswa_id' => $s1->id, 'jenis_hafalan' => 'surat_pendek', 'surat' => 'Al-Falaq', 'progress' => 40, 'tanggal' => now()]);

        // Karakter 6 aspek
        foreach (['Disiplin','Jujur','Tanggung Jawab','Mandiri','Santun','Kerjasama'] as $aspek) {
            Karakter::create(['siswa_id' => $s1->id, 'aspek' => $aspek, 'nilai' => fake()->randomElement(['A','B']), 'tanggal' => now()]);
        }

        CatatanGuru::create(['siswa_id' => $s1->id, 'guru_id' => $g1->id, 'catatan' => 'Terus semangat menghafal!', 'tanggal' => now()]);
    }
}
