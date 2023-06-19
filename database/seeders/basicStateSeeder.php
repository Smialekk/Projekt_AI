<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class basicStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    try {
        $path = storage_path('csv/basic_state.csv');
        $data = File::get($path);
        $rows = explode("\n", $data);

        foreach ($rows as $row) {
            $values = explode(';', $row);

            if (count($values) === 4) {
                DB::table('basic_state')->insert([
                    'name' => $values[0],
                    'description' => $values[1],
                    'image_path' => $values[2],
                    'longdesc' => $values[3],
                ]);
            } else {
                // Obsługa błędu - wiersz pliku CSV nie ma oczekiwanej liczby pól
                // Możesz zignorować ten wiersz lub wyświetlić informację o błędzie.
                continue; // Kontynuuj pętlę, pomijając błędny wiersz
            }
        }
    } catch (\Exception $e) {
        // Obsługa wyjątku - np. wyświetlenie komunikatu o błędzie
        // Możesz również zdecydować, czy przerwać dalsze przetwarzanie danych.
        report($e); // Zgłoś wyjątek do systemu raportowania błędów (opcjonalne)
    }
}

}

        // DB::table('basic_state')->insert([
        //     [
        //         'name' => 'Fundamenty',
        //         'description' => 'Wykonujemy solidne fundamenty, zapewniające stabilność i nośność całej konstrukcji budynku.',
        //         'image_path' => $imageDataArray[0],
        //     ],
        //     [
        //         'name' => 'Ściany zewnętrzne',
        //         'description' => 'Wznosimy solidne ściany zewnętrzne, zapewniające ochronę i izolację termiczną budynku.',
        //         'image_path' => $imageDataArray[1],
        //     ],
        //     [
        //         'name' => 'Ściany wewnętrzne i działowe',
        //         'description' => 'Budujemy ściany wewnętrzne i działowe, tworzące podziały pomiędzy pomieszczeniami wewnątrz budynku.',
        //         'image_path' => $imageDataArray[2],
        //     ],
        //     [
        //         'name' => 'Stropy i dach',
        //         'description' => 'Konstruujemy stropy i dachy, zapewniające bezpieczeństwo i ochronę przed warunkami atmosferycznymi.',
        //         'image_path' => $imageDataArray[3],
        //     ],
        //     [
        //         'name' => 'Instalacje podstawowe (elektryczne, wodno-kanalizacyjne)',
        //         'description' => 'Przeprowadzamy prace związane z instalacjami elektrycznymi, wodno-kanalizacyjnymi i innymi podstawowymi systemami.',
        //         'image_path' => $imageDataArray[4],
        //     ],
        //     [
        //         'name' => 'Wykopy i prace ziemne',
        //         'description' => 'Przeprowadzamy wykopy i prace ziemne, przygotowujące teren pod budowę.',
        //         'image_path' => $imageDataArray[5],
        //     ],
        // ]);

