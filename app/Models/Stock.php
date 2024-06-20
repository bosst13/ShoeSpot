<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks'; // Specify the table name if it's different from the model name
    protected $primaryKey = 'stock_id'; // Specify the primary key if it's different from 'id'
    protected $fillable = [
        'product_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'stocklines','stock_id', 'supplier_id');
    }
}
