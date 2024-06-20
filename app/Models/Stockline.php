<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockline extends Model
{
    use HasFactory;
    protected $table = 'stocklines'; // Specify the table name if it's different from the model name
    protected $fillable = [
        'supplier_id',
        'stock_id',
    ];
}
