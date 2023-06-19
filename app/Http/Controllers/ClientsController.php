<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        return view('clients.clients', [
            'clients' => Clients::all()
        ]);
    }

    public function edit($id)
    {
        $client = Clients::find($id);
        return view('clients.edit', [
            'client' => $client
        ]);
    }

    public function update(Request $request, $id)
    {
        $client = Clients::find($id);
        $client->name = $request->input('name');
        $client->surename = $request->input('surename');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->preferences = $request->input('preferences');
        $client->save();

        if ($client->employee !== null) {
            $employee = $client->employee;
            $employee->name = $request->input('name');
            $employee->surename = $request->input('surename');
            $employee->email = $request->input('email');
            $employee->phone = $request->input('phone');
            $employee->save();
        }

        return redirect()->route('clients')->with('success', 'Klient został zaktualizowany');
    }

    public function delete($id)
    {
        $client = Clients::find($id);
        return view('clients.delete', [
            'client' => $client
        ]);
    }

    public function destroy($id)
    {
        $client = Clients::find($id);

        // Usuń rekordy powiązane z tabelą 'employees'
        $client->employee()->delete();
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Klient został usunięty');
    }
}
