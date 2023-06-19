<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Clients;
use App\Models\Employees;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                'unique:clients',

            ],
            'password' => [
                'required',
                'string',
                'min:8',

            ],
            'phone' => 'required|numeric|min:9',
        ], [
            'email.unique' => 'Podany adres e-mail jest już zajęty.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $isEmployee = $request->has('is_employee') && $request->input('is_employee');
        $employeeCode = $request->input('employee_code');

        if ($isEmployee && $employeeCode !== 'KOD_PRACOWNICZY') {
            return redirect()->back()->withInput()->withErrors(['employee_code' => 'Podaj poprawny kod pracowniczy.']);
        }

        $client = new Clients();
        $client->name = $request->input('name');
        $client->surename = $request->input('surname');
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password'));
        $client->phone = $request->input('phone');
        $client->save();

        $isEmployee = isset($request['is_employee']) && $request['is_employee'];

        if ($isEmployee) {
            $employee = new Employees();
            $employee->name = $request->input('name');
            $employee->surename = $request->input('surname');
            $employee->email = $request->input('email');
            $employee->profession = $request->input('profession');
            $employee->phone = $request->input('phone');
            $employee->client_id = $client->id;
            $client->is_employee = true;
            $employee->save();
        }
        $client->save();
        return redirect()->route('login')->with('success', 'Rejestracja zakończona pomyślnie. Możesz się teraz zalogować.');

    }
}
