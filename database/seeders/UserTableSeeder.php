<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'Yadhu',
            'email' =>'yadhu@gmail.com',
            'dob' =>'1999-11-07',
        ]);
    }
}
