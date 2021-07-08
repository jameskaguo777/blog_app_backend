<?php

namespace Database\Seeders;

use App\Models\Profile;
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
            'email' => 'emanuel@tilemu.com',
            'phone' => '+255712123456',
            'password' => Hash::make('123456')

        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
        ]);

        $user->assignRole('super-admin');
    }
}
