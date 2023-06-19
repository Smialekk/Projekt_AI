<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function index()
    {
        return view('orders.orders', [
            'orders' => orders::all()
        ]);
    }

    public function create()
    {
        $order = new Orders();

        return view('orders.create-order', [
            'order' => $order
        ]);
    }

    public function store(Request $request)
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
        $client_id = $request->input('client_id');
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
        $order->client_id = $client_id;
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

    public function edit($id)
    {
        $order = Orders::find($id);
        return view('orders.edit', [
            'order' => $order
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Orders::find($id);
        $order->client_id = $request->input('client_id');
        $order->name = $request->input('name');
        $order->surname = $request->input('surname');
        $order->category = $request->input('category');
        $order->subcategory = $request->input('subcategory');
        $order->date = $request->input('date');
        $order->street = $request->input('street');
        $order->number = $request->input('number');
        $order->city = $request->input('city');
        $order->region = $request->input('region');
        $order->postal_code = $request->input('postal_code');
        $order->country = $request->input('country');
        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('orders')->with('success', 'Zamówienie zostało zaktualizowane');
    }

    public function delete($id)
    {
        $order = Orders::find($id);
        return view('orders.delete', [
            'order' => $order
        ]);
    }

    public function destroy($id)
    {
        $order = Orders::find($id);

        $order->delete();


        return redirect()->route('orders.index')->with('success', 'Zamówienie zostało usunięte');
    }

}
