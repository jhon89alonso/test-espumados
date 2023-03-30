<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class UserExportPDFController extends Controller
{
    public function exporPdfUser(){
        $users = User::all();
        $date =date( date('Y-m') );
        $userAuth = Auth::user()->name;
        //dd($userAuth);

        $pdf = \PDF::loadView('Exports.userExport', compact('users','userAuth'));

        return $pdf->stream('informe '.$date.'.pdf');
    }

    public function exportExcel() 
    {
         $date =date( date('Y-m') );
        return Excel::download(new UsersExport, 'users.xlsx',);
    }
}
