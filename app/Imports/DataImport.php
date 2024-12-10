<?php

namespace App\Imports;
use App\Models\BankDetail;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToModel
{
    /**
    * @param array $collection
    */
    public function model(array $collection)
    {
      
        $data=BankDetail::where('acc_no', $collection['2'])-> update([
            'status' => $collection['4']

        ]);




 

        return null;
    //     return new BankDetail([
    //     'name' => $collection['1'],
    //     'acc_no' => $collection['2'],
    //     'ifsc_code' => $collection['3'],
        
    // ]);

    }
}
