<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('links')->truncate();
        DB::table('resource_groups')->truncate();
        DB::table('applications')->truncate();
        DB::table('users')->truncate();

        //users

        DB::table('users')->insert([
            'id' => Str::orderedUuid(),
            'username' => 'bravod',
            'id_number' => '2017-00027',
            'type' => 'Employee',
            'name' => 'Heremias Delos Santos',
            'first_name' => 'Heremias III',
            'middle_name' => 'Oczon',
            'last_name' => 'Delos Santos',
            'email' => 'bravod@apc.edu.ph',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()
        ]);

        $app_id = Str::orderedUuid();
        //applications
        DB::table('applications')->insert([
            'id' => $app_id,
            'name' => 'Administration App',
            'description' => 'Administration application',
            'icon' => 'fa fa-cogs',
            'url' => 'http://app.master',
            'created_at' => Carbon::now()
        ]);

        $resource_id = Str::orderedUuid();
        //resource_groups
        DB::table('resource_groups')->insert([
            'id' => $resource_id,
            'application_id' => $app_id,
            'name' => 'Administration',
            'icon' => 'fa fa-cogs',
            'created_at' => Carbon::now()
        ]);

        //links
        DB::table('links')->insert([
            'id' => Str::orderedUuid(),
            'application_id' => $app_id,
            'resource_group_id' => $resource_id,
            'title' => 'Links',
            'url' => '/link',
            'icon' => 'fa fa-link',
            'active_pattern' => '/link*',
            'created_at' => Carbon::now()
        ]);
    }
}
