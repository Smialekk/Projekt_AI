<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\TrueType;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('employees')->insert([
        //     [
        //         'name' => 'Janusz',
        //         'surename' => 'Exkomunikado',
        //         'email' => 'janex@gmail.com',
        //         'phone' => '123456789',
        //         'profession' => 'Administrator',
        //         'skills' => NULL,
        //         'schedule' => NULL,
        //         'salary' => 5000,
        //         'is_admin' => true,
        //     ],
        // ]);
    }
}
