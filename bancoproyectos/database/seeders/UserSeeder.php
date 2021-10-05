<?php

namespace Database\Seeders;

use App\Models\Dependencia;
use App\Models\User;
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
    
        $user = new User();
    $user->name = "administrador defecto";
    $user->email = "admin@admin.com";
    $user->password = bcrypt("admin123");
    $user->email_verified_at = now();
    $remember_token = "asfsrtertr";
    $user->dependencia_id = Dependencia::take(1)->first()->id;
    

    $user->save();

    User::factory(20)->create();

    }
}
