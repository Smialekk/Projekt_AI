<?php
use Illuminate\Support\Facades\DB;

// Pobierz identyfikator usługi z parametru `id` w adresie URL

$id = $_GET['id'];

// Pobierz dane obrazu z bazy danych na podstawie identyfikatora
$service = DB::table('basic_state')->where('id', $id)->first();

// Ustaw nagłówek Content-Type na odpowiedni typ obrazu (np. image/jpeg lub image/png)
header('Content-Type: image/jpeg');

// Zwróć zawartość kolumny `image` jako odpowiedź
echo $service->image;
