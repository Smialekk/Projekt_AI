<?php

namespace Database\Seeders;

use App\Models\Clients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'name' => 'Jaś',
                'surename' => 'Daś',
                'email' => 'john2@example.com',
                'password' => bcrypt('p123'),
                'phone' => '123456789',
                'preferences' => 'Preferuje gdy ekipa pracuje w godzinach porannych, wtedy jestem w domu i z chęcią udzielam się z pomocą',
                'is_admin' => false,
                'is_employee' => false,
            ],
            [
                'name' => 'Janusz',
                'surename' => 'Exkomunikado',
                'email' => 'janex@gmail.com',
                'password' => bcrypt('p123'),
                'phone' => '666777222',
                'preferences' => null,
                'is_admin' => true,
                'is_employee' => false,
            ],
            [
                'name' => 'Zbigniew',
                'surename' => 'Kniaź',
                'email' => 'Zbigniew@gmail.com',
                'password' => bcrypt('p123'),
                'phone' => '524655666',
                'preferences' => 'Lubie, gdy praca idzie do przodu, a ja nie jestem nikomu potrzebny, najlepiej gdy wtedy jestem poza miejscem budowy/remontu',
                'is_admin' => true,
                'is_employee' => false,
            ],
            [
                'name' => 'Anna',
                'surname' => 'Garcia',
                'email' => 'anna@gmail.com',
                'password' => bcrypt('p123'),
                'phone' => '111222333',
                'preferences' => 'Si muchas gracias Neque porro quisquam est qui dolorem ipsum quia dolor sit amet.',
                'is_admin' => false,
                'is_employee' => false,
            ],
            [
                'name' => 'Sewerus',
                'surname' => 'Paker',
                'email' => 'Paker@gmail.com',
                'password' => bcrypt('p123'),
                'phone' => '876678876',
                'preferences' => 'brak :)',
                'is_admin' => false,
                'is_employee' => false,
            ],
            [
                'name' => 'Andrew',
                'surname' => 'Gate',
                'email' => 'Gate@gmail.com',
                'password' => bcrypt('p123'),
                'phone' => '999007888',
                'preferences' => 'Every time I am home renovating, I am buying a beer for the builders ;)',
                'is_admin' => false,
                'is_employee' => false,
            ],
        ]);
    }
}
