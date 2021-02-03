<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationRequest extends Model
{
    use HasFactory;

    public function vacation()
    {
        return $this->belongsTo(Vacation::class);
    }
    public function team()
    {
        return $this->hasOne(Team::class);
    }
}
