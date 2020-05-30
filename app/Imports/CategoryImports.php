<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImports implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Category([
            'category_name' => $row[0]

        ]);
    }
}
