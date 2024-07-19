<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  Booking::all();
    }

    public function headings(): array
    {
        return [
            'ID', 
            'User ID', 
            'Vehicle ID', 
            'Driver ID', 
            'Approver Level 1', 
            'Approver Level 2', 
            'Status', 
            'Start Date', 
            'End Date',
            'Created At',
            'Updated At',

        ];
    }
}