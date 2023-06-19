<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class Clients extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('main');
        }

        return back()->withErrors([
            'email' => 'Podane dane uwierzytelniania nie są poprawne.',
        ])->onlyInput('email');
    }

    public function isEmployee()
    {
        return $this->is_employee;
    }


    public function isAdmin()
    {
        return $this->is_admin;
    }


    public function employee()
    {
        return $this->hasOne(Employees::class, 'client_id');
    }

}
