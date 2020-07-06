<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use App\Exports\InformationExport;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
	public function export() 
	{
   		return Excel::download(new InformationExport, 'informations.xlsx');
	}
}
