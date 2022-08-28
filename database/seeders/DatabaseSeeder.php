<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $kategori = array(
            "Lainnya",
            "Keanggotaan",
            "Rapat",
        );

        foreach($kategori as $value){
            \App\Models\Kategori::create([
                "kategori" => $value
            ]);
        }

        \App\Models\User::create([
            'nama' => "Fikiturrohman",
            'jk' => "L",
            'no_hp' => "085333403991",
            'jabatan' => "Adminstrator",
            'username' =>"admin",
            'password' => Hash::make('admin'),
            'roles' => "admin"
        ]);

        \App\Models\User::create([
            'nama' => "Agus Indra",
            'jk' => "L",
            'no_hp' => "085330256000",
            'jabatan' => "Pengurus PC IPNU",
            'username' =>"petugas",
            'password' => Hash::make('petugas'),
            'roles' => "petugas"
        ]);

        \App\Models\User::create([
            'nama' => "Rizal Efendi",
            'jk' => "L",
            'no_hp' => "085330256000",
            'username' =>"user1",
            'password' => Hash::make('user1'),
            'roles' => "user"
        ]);


    }
}
