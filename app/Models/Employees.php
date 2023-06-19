<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Employees extends Model
{
    use HasFactory;

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
        ]);

        if (Auth::guard('employees')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('main');
        }

        return back()->withErrors([
            'email' => 'Podane dane uwierzytelniania nie są poprawne.',
        ])->onlyInput('email');
    }

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
