<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands'; // Specify the table name if it's different from the model name
    protected $primaryKey = 'brand_id'; // Specify the primary key if it's different from 'id'
    protected $fillable = [
        'name',
        'image_path',
    ];

    public function productBrand()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
