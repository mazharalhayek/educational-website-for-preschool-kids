<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert
        ([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('aaaaaaaaa'),
                'type' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]
    );
    DB::table('admins')->insert
        ([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('aaaaaaaaa'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]
    );
    }
}

