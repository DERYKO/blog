<?php

use App\Data\UserType;
use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_types = [
            [
                "name" => "Admin",
                "key" => "admin"
            ],
            [
                "name" => "Blogger",
                "key" => "blogger"
            ]
        ];
       collect($user_types)->each(function ($user_type){
          UserType::updateOrCreate($user_type);
       });
    }
}
