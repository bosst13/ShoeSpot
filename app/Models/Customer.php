<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'phone',
        'profile_picture',
        'addressline',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Orderinfo::class, 'customer_id');
    }
}
