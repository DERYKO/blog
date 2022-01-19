<?php

use App\Data\UserType;
use App\User;
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
        $user_type = UserType::where('key','admin')->first();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone_number' => '0700000000',
            'user_type_id' => $user_type->id,
            'password' => Hash::make('@password!')
        ]);
    }
}
