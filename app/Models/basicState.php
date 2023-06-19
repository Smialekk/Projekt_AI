<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basicState extends Model
{
    use HasFactory;

    protected $table = 'basic_state';

    protected $fillable = [
        'name', 'description'
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
