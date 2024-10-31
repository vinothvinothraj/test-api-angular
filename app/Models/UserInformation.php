<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'first_name',
        'last_name',
        'email',
        'nic_id', 
        'gender',
        'address', 
        'phone',
        'user_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
