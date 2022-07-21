<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Emir',
            'email' => 'emir@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);

        User::create([
            'name' => 'Kemal',
            'email' => 'kemal@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);


        User::create([
            'name' => 'Sinan',
            'email' => 'sinan@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);

        User::create([
            'name' => 'Yunus',
            'email' => 'yunus@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);

        User::create([
            'name' => 'Fikri',
            'email' => 'fikri@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);

        User::create([
            'name' => 'Esin',
            'email' => 'esin@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);


        User::create([
            'name' => 'Mustafa',
            'email' => 'mustafa@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);

        User::create([
            'name' => 'Süleyman',
            'email' => 'suleyman@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);

        User::create([
            'name' => 'Musa',
            'email' => 'musa@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);

        User::create([
            'name' => 'Muhammed',
            'email' => 'muhammed@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);

        User::create([
            'name' => 'Hasan',
            'email' => 'hasan@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);

        User::create([
            'name' => 'Yusuf',
            'email' => 'yusuf@gmail.com',
            'password' => '$2y$10$Fmy36.dKXBS3y1SaBwxea.mbLiUh/gqKbPjCCkeSuY.d3DNzeuRWK'
        ]);
    }
}
