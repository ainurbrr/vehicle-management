<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export_excel()
	{
		return Excel::download(new BookingsExport, 'bookings.xlsx');
	}
}
