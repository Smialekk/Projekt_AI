<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FinishingWorks;
use App\Http\Controllers\Controller;
use App\Models\basicState;
use Illuminate\Support\Facades\Auth;
use App\Models\orders;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $finishingWorks = FinishingWorks::all();
        $basicState = basicState::all();
        $category = $request->input('category', '');
        return view('form', compact('finishingWorks','category','basicState'));
    }

    public function orderForm($category_id)
    {
        $category = FinishingWorks::find($category_id);

        if (Auth::check()) {
            // Jeśli użytkownik jest zalogowany, przekazujesz kategorię do widoku formularza zamówienia
            return view('form')->with('category', $category);
        } else {
            // Jeśli użytkownik nie jest zalogowany, przekieruj go do widoku logowania
            return view('login');
        }
    }


    public function save(Request $request)
    {
    // Walidacja danych
    $validatedData = $request->validate([
        'name' => 'required|string',
        'surname' => 'required|string',
        'category' => 'required',
        'subcategory' => 'required',
        'date' => 'required|date',
        'street' => 'required|string',
        'number' => 'required|numeric',
        'city' => 'required|string',
        'region' => 'required|string',
        'postal_code' => 'required|numeric',
        'country' => 'required|string',
    ]);

        // Pobierz dane z formularza
        $name = $request->input('name');
        $surname = $request->input('surname');
        $category = $request->input('category');
        $subcategory = $request->input('subcategory');
        $date = $request->input('date');
        $street = $request->input('street');
        $number = $request->input('number');
        $city = $request->input('city');
        $region = $request->input('region');
        $postalCode = $request->input('postal_code');
        $country = $request->input('country');

        // Tworzenie nowego zamówienia
        $order = new orders();
        $order->client_id = Auth::user()->id;
        $order->name = $name;
        $order->surname = $surname;
        $order->category = $category;
        $order->subcategory = $subcategory;
        $order->date = $date;
        $order->street = $street;
        $order->number = $number;
        $order->city = $city;
        $order->region = $region;
        $order->postal_code = $postalCode;
        $order->country = $country;
        $order->status = 'Weryfikacja';

        // Zapisz zamówienie do bazy danych
        $order->save();

        // Przekierowanie użytkownika po zapisie zamówienia
        return redirect()->back()->with('message', 'Twoje zamówienie zostało zapisane. Czekaj cierpliwie!');
    }
}
