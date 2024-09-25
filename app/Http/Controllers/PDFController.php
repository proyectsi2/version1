<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\View\View;

use Illuminate\Support\Facades\Blade;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    /*public function index(): View
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }*/

    public function report()
    {
        //$users = Compra::all();
        $users = Compra::with('proveedor')->get();
        
        $pdf = Pdf::loadView('users.report', compact('users'));

        return $pdf->stream('users_report.pdf');
        //return $pdf->download('reporte.pdf');
    }
}
