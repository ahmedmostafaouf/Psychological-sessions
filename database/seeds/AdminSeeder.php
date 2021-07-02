<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Doctor::create([
            'name' => 'Suber Admin',
            'email' => 'suber_admin@app.com',
            'password' => Hash::make('123456'),
            'phone' => '01066273085',
            'is_admin' => '1'
        ]);


    }
}
