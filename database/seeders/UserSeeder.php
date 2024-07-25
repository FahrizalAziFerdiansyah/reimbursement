<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $director = User::firstOrCreate([
            'nip' => '1234',
            'name' => 'DONI',
            'position' => 'DIREKTUR',
            'password' => bcrypt(123456)
        ]);
        $director->assignRole('director');

        $finance = User::firstOrCreate([
            'nip' => '1235',
            'name' => 'DONO',
            'position' => 'FINANCE',
            'password' => bcrypt(123456)
        ]);
        $finance->assignRole('finance');
    }
}
