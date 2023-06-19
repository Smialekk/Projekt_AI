<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'message', 'client_id'];

    // Definicje relacji
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
