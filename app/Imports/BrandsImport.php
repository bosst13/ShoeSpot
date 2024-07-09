<?php

namespace App\Imports;

use App\Models\Brand;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BrandsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Brand::updateOrCreate(
                ['name' => $row['name']],
                [
                    'images' => $row['images'],
                    
                ]
            );
        }
    }
}