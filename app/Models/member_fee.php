<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'receipt',
        'status',
    ];

    public function member()
    {
        return $this->belongsTo(members::class);
    }
}
