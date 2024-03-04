<?php

namespace App\Exports;

use App\Models\Alhaji;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportAllAlhazaiParam implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection

    */
    private $accomodated;
    

    public function __construct($acc)
    {
        $this->accomodated = $acc;
       
    }

    public function query()
    {
        return Alhaji::select('alhajiId', 'fullname', 'lga', 'town', 'gender', 'accomodated', 'hajjYear')
        ->where('hajjYear', '2023')->where('accomodated', $this->accomodated)->orderBy('alhajiId');
    }
    public function headings(): array
    {
        return ["ID", "Name", "Local Government","Town", "Gender", 'Accomodated', 'Hajj Year'];
    }
}
