<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\laboratory;
use App\Models\Ray;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $doctors = Doctor::withCount('summaries')->orderBy('id', 'desc')->limit(10)->get();
        $count_invoices1 = Invoice::where('status', 1)->count();
        $count_invoices2 = Invoice::where('status', 2)->count();
        $count_invoices3 = Invoice::where('status', 3)->count();

        
        $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['not Review', 'under Review','Complete'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB','#ff9642'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#ff9642'],
                'data' => [$count_invoices1 , $count_invoices2,$count_invoices3]
            ]
        ])
        ->options([]);
        
        $xrayComplete = Ray::where('case', 1)->count(); 
        $xrayNotComplete = Ray::where('case', 0)->count(); 
        // $labComplete = laboratory::where('case', 1)->count(); 
        // $labNotComplete = laboratory::where('case', 0)->count();   
        $chartjs1 = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['x-Ray complete','x-Ray not complete' ])
        ->datasets([
            [
                "label" => "x-Ray complete",
                'backgroundColor' => ['#ec5858'],
                'data' => [$xrayComplete],
                'width' => 350,
            ],
            [
                "label" => "x-Ray not complete",
                'backgroundColor' => ['#81b214'],
                'data' => [$xrayNotComplete]
            ],
           
        ])
        ->options([]);
        return view('dashboard.index',compact('chartjs','chartjs1'));
    }
}
