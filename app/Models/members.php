<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'first_name', 'middle_initial', 'last_name',
        'address', 'birthdate', 'religion', 'join_date', 'parent_leader',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function beneficiaries()
    {
        return $this->hasMany(beneficiaries::class);
    }
}
