<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'employee_id', 'address', 'service', 'status', 'deadline', 'additional_notes'
    ];

    // Relacja z modelem "Client"
    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }

    public static function getCurrentClientId()
    {
        return session('client_id'); // Przyjmuję, że klienta przypisujesz do sesji pod kluczem 'client_id'
    }


    // Relacja z modelem "Employee"
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


}
