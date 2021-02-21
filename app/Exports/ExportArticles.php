<?php

namespace App\Exports;

use App\Models\API\Article;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportArticles implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Article::all();
    }
}
