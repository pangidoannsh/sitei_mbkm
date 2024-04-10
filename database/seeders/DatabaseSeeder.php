<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dosen;
use App\Models\Konsentrasi;
use App\Models\Mahasiswa;
use App\Models\Mbkm\MataKuliah;
use App\Models\Prodi;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'username' => 'tariseptaviani',
            'nama' => 'Tari Septa Viani',
            'email' => 'tarisepta@gmail.com',
            'password' => bcrypt('1'),
        ]);

        User::create([
            'role_id' => 2,
            'username' => 'muhammadpeter',
            'nama' => 'Muhammad Peter, A.Md',
            'email' => 'muhpeter@gmail.com',
            'password' => bcrypt('1'),
        ]);

        User::create([
            'role_id' => 3,
            'username' => 'khairinafitria',
            'nama' => 'Khairina Fitria Lubis, S.Kom',
            'email' => 'khairinafitria@gmail.com',
            'password' => bcrypt('1'),
        ]);

        User::create([
            'role_id' => 4,
            'username' => 'zainalasri',
            'nama' => 'Zainal Asri',
            'email' => 'zainalasri@gmail.com',
            'password' => bcrypt('1'),
        ]);
        Dosen::create([
            'role_id' => 8,
            'nip' => 197404282002121003,
            'password' => bcrypt('1'),
            'nama' => 'Dr. Feri Candra, ST., MT',
            'nama_singkat' => 'FC',
            'email' => 'fericandra.lecturer@unri.ac.id',
        ]);

        Mahasiswa::create([
            'prodi_id' => 3,
            'konsentrasi_id' => 4,
            'nim' => '2007125743',
            'nama' => 'Muhammad Abdullah Qosim',
            'email' => 'muhammad.abdullah5743@student.unri.ac.id',
            'password' => bcrypt('1'),
            'angkatan' => '2020',
        ]);
        Mahasiswa::create([
            'prodi_id' => 3,
            'konsentrasi_id' => 4,
            'nim' => '2007135748',
            'nama' => 'Fitra Ramadhan',
            'email' => 'fitra.ramadhan5748@student.unri.ac.id',
            'password' => bcrypt('1'),
            'angkatan' => '2020',
        ]);

        Prodi::create([
            'nama_prodi' => 'Teknik Elektro D3'
        ]);

        Prodi::create([
            'nama_prodi' => 'Teknik Elektro S1'
        ]);

        Prodi::create([
            'nama_prodi' => 'Teknik Informatika S1'
        ]);

        Konsentrasi::create([
            'nama_konsentrasi' => 'Teknik Tenaga Listrik'
        ]);

        Konsentrasi::create([
            'nama_konsentrasi' => 'Teknik Telekomunikasi'
        ]);

        Konsentrasi::create([
            'nama_konsentrasi' => 'Komputasi Cerdas dan Visualiasi'
        ]);

        Konsentrasi::create([
            'nama_konsentrasi' => 'Rekayasa Perangkat Lunak'
        ]);

        Konsentrasi::create([
            'nama_konsentrasi' => 'Komputasi Berbasis Jaringan'
        ]);
        $programs = [
            "Studi Indenpenden", "Magang", "IISMA", "PMM (Pertukaran Pelajar Merdeka)",
            "KAMPUS MENGAJAR", "Lainnya"
        ];
        foreach ($programs as  $program) {
            Program::create([
                'name' => $program
            ]);
        }
        MataKuliah::create([
            "kode_mk" => "TI123",
            "mk" => "Rekayasa Web",
            "sks" => 4,
        ]);
        MataKuliah::create([
            "kode_mk" => "TI234",
            "mk" => "Etika Profesi",
            "sks" => 2,
        ]);
        MataKuliah::create([
            "kode_mk" => "TI345",
            "mk" => "Pengujian Sistem Informasi",
            "sks" => 3,
        ]);
    }
}
