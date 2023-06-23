<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuilderPanelController extends Controller
{
    public function index()
    {
        $employee = Employees::join('clients', 'employees.client_id', '=', 'clients.id')
        ->where('clients.id', Auth::id())
        ->where('clients.is_employee', true)
        ->select('employees.*')
        ->first();

        return view('employees.builderPanel', [
            'employee' => $employee
        ]);
    }

    public function edit($id)
    {
        $employee = Employees::find($id);
        // Sprawdź, czy pracownik jest zalogowanym pracownikiem
        if ($employee->user_id !== Auth::id()) {
            return redirect()->route('builderPanel')->with('error', 'Nie masz uprawnień do edycji tego pracownika');
        }
        return view('employees.builderPanel.edit', [
            'employee' => $employee
        ]);
    }

    public function update(Request $request, $id)
    {
        $employee = Employees::find($id);

        // Sprawdź, czy pracownik jest zalogowanym pracownikiem
        if ($employee->client_id !== Auth::id()) {
            return redirect()->route('builderPanel')->with('error', 'Nie masz uprawnień do edycji tego pracownika');
        }
        $employee->profession = $request->input('profession');
        $employee->skills = $request->input('skills');
        $employee->schedule = $request->input('schedule');
        $employee->save();
        return redirect()->route('builderPanel.index')->with('success', 'Pomyślnie zaktualizowano pola');
    }
}

