<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function PDFDownloadToday()
    {

        $date = date('d/m/Y');
        $total = DB::table('orders')->where('order_date', $date)->sum('total');
        $pay = DB::table('orders')->where('order_date', $date)->sum('pay');
        $due = DB::table('orders')->where('order_date', $date)->sum('due');

        $sales =DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')
                ->where('order_date',$date)
                ->get();
        $data=[
            'total'=>$total,
            'pay'=>$pay,
            'due'=>$due,
            'sales'=>$sales,
        ];

    $pdf = PDF::loadView('salesReports.pdf',$data);
    return $pdf->download($date.'SalesReports.pdf');
    }

    public function PDFDownloadMonth($month)
    {
        $date = $month;
        $total = DB::table('orders')->where('month', $date)->sum('total');
        $pay = DB::table('orders')->where('month', $date)->sum('pay');
        $due = DB::table('orders')->where('month', $date)->sum('due');

        $sales =DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')
                ->where('month',$date)
                ->get();

                $data=[
                    'date'=>$date,
                    'total'=>$total,
                    'pay'=>$pay,
                    'due'=>$due,
                    'sales'=>$sales,
                ];

            $pdf = PDF::loadView('salesReports.pdf',$data);
            return $pdf->download($date.'SalesReports.pdf');
    }
}
