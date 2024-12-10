<?php

namespace App\Exports;

use App\Models\BankDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BankDetail::all();
    }

    public function headings(): array
    {
        return [
            'id',         // Column name for the 'id' column
            'name', // Column name for the 'account_name' column
            'acc_no', // Column name for the 'account_number' column
            'ifsc_code', 
            'status',  // Column name for the 'bank_name' column
            'Created At',  // Column name for the 'created_at' column
            'Updated At',  // Column name for the 'updated_at' column
        ];
    }
}
