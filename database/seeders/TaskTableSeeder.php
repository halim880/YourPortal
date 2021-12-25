<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('set foreign_key_checks = 0');
        // Task::truncate();
        // DB::statement('set foreign_key_checks = 1');
        // $client_id = Client::first()->user->id;
        // Task::create([
        //     'title'=>'This is the first title',
        //     'description'=>'this is the first description',
        //     'client_id'=> $client_id
        // ]);
        // Task::create([
        //     'title'=>'This is the second title',
        //     'description'=>'this is the second description',
        //     'client_id'=> $client_id,
        // ]);
    }
}
