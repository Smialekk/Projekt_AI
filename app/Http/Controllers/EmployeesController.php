<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('employees.employees', [
            'employees' => Employees::all()
        ]);
    }

    public function edit($id)
    {
        $employee = Employees::find($id);
        return view('employees.edit', [
            'employee' => $employee
        ]);
    }

    public function update(Request $request, $id)
    {
        $employee = Employees::find($id);
        $employee->name = $request->input('name');
        $employee->surename = $request->input('surename');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->profession = $request->input('profession');
        $employee->skills = $request->input('skills');
        $employee->schedule = $request->input('schedule');
        $employee->salary = $request->input('salary');
        $employee->save();

        $client = $employee->client;
        $client->name = $request->input('name');
        $client->surename = $request->input('surename');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->save();

        return redirect()->route('employees')->with('success', 'Pracownik został zaktualizowany');
    }

    public function delete($id)
    {
        $employee = Employees::find($id);
        return view('employees.delete', [
            'employee' => $employee
        ]);
    }

    public function destroy($id)
    {
        $employee = Employees::find($id);

        // Usuń powiązanego klienta
        $client = $employee->client;
        // $client->delete();

        $employee->delete();
        $client->delete();

        return redirect()->route('employees.index')->with('success', 'Pracownik został usunięty');
    }
}
