<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal as A;

class Cart extends Model
{
    use HasFactory;

    const STATUSES = [

        1 => 'New',
        2 => 'Confirmed',
        3 => 'Canceled',
        4 => 'Done'

    ];

    public function animal()
    {
        return $this->belongsTo(A::class, 'animal_id', 'id');
    }
}
