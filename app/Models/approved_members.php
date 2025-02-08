<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class approved_members extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'receipt',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}
