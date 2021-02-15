<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('admins')->insert(
        [
            'email' => 'demo@admin.com',
            'password' => bcrypt('admin@2020'),
        ]);
    }
}
