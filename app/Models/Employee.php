<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'surname',
        'address',
        'vacation_days_left',
        'team_id',
        'role_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function vacation()
    {
        return $this->hasMany(Vacation::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
