<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class FinishingWorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // public function run(): void
    // {
    //     $path = storage_path('csv/finishing_works.csv');
    //     $data = File::get($path);
    //     $rows = explode("\n", $data);

    //     foreach ($rows as $row) {
    //         $values = explode(';', $row);

    //     DB::table('finishing_works')->insert([

    //         'name' => $values[0],
    //         'description' => $values[1],
    //         'image_path' => $values[2],
    //         'longdesc' => $values[3],
    //     ]);



    //     }
    // }

    public function run(): void
{
    try {
        $path = storage_path('csv/finishing_works.csv');
        $data = File::get($path);
        $rows = explode("\n", $data);

        foreach ($rows as $row) {
            $values = explode(';', $row);

            if (count($values) === 4) {
                DB::table('finishing_works')->insert([
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



        // DB::table('finishing_works')->insert([
        //     [
        //         'name' => 'Tynkowanie',
        //         'description' => 'Wykonujemy tynkowanie ścian zewnętrznych i wewnętrznych.',
        //     ],
        //     [
        //         'name' => 'Malowanie',
        //         'description' => 'Oferujemy usługi malowania ścian i sufitów w różnych technikach.',
        //     ],
        //     [
        //         'name' => 'Glazurnictwo',
        //         'description' => 'Specjalizujemy się w układaniu glazury i terakoty w łazienkach i kuchniach.',
        //     ],
        //     [
        //         'name' => 'Podłogi',
        //         'description' => 'Montujemy podłogi drewniane, panelowe, a także wykładziny.',
        //     ],
        //     [
        //         'name' => 'Ocieplanie',
        //         'description' => 'Wykonujemy profesjonalne ocieplanie ścian, także z zastosowaniem najlepszych styropianów.',
        //     ],
        //     [
        //         'name' => 'Montaż sufitów podwieszanych',
        //         'description' => 'Zajmujemy się montażem sufitów podwieszanych z oświetleniem LED.',
        //     ],
        // ]);
