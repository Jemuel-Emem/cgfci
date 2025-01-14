<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beneficiaries extends Model
{
    use HasFactory;
    protected $fillable = ['member_id', 'beneficiary_name', 'birthdate'];

    public function member()
    {
        return $this->belongsTo(members::class);
    }
}
