<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Client::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $user = User::create([
            'email'=>'client@gmail.com',
            'name'=> 'Client',
            'password'=> bcrypt('password'),
        ]);
        Client::create([
            'user_id'=> $user->id,
            'TIN'=> rand(1000000, 99999999),
            'phone'=> '01743 920880',
        ]);

        $user->assignRole('client');
    }
}
