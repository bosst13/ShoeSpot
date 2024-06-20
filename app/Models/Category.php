<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories'; // Specify the table name if it's different from the model name
    protected $primaryKey = 'category_id'; // Specify the primary key if it's different from 'id'
    protected $fillable = [
        'name',
        'status',
        'image',
    ];
}
