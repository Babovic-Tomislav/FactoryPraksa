<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'employee_id'
        ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function vacationRequest()
    {
        return $this->hasOne(VacationRequest::class);
    }
}
