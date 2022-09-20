<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;

class CitiesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $anycity = City::where('name', $row[0])->first();
        if (!$anycity) {
            return new City([
                'name'     => $row['0'],
                'state'     => $row['1'],
                'country'     => $row['2'],
                'iso2'     => $row['3'],
                'iso3'     => $row['4'],
            ]);
        }
    }
}
