<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name'=> 'Emmanuel Tilemu',
            'email' => 'jameskaguo@live.com',
            'phone' => '+255712011189',
            'password' => Hash::make('secret123')

        ]);

        $user->assignRole('super-admin');
    }
}
