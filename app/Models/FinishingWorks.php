<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class finishingWorks extends Model
{

    use HasFactory;

    protected $table = 'finishing_works'; // Nazwa tabeli w bazie danych

    protected $fillable = [
        'name', 'description'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
