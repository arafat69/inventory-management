<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesreportController extends Controller
{
    public function todaySales()
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
        return view('salesReports.today', compact('total', 'due', 'sales','pay'));
    }

    public function monthSales($month = null)
    {
        $date = date('F');
        if ($month != '') {
            $date = $month;
        }
        $total = DB::table('orders')->where('month', $date)->sum('total');
        $pay = DB::table('orders')->where('month', $date)->sum('pay');
        $due = DB::table('orders')->where('month', $date)->sum('due');

        $sales =DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')
                ->where('month',$date)
                ->get();
        return view('salesReports.month', compact('total', 'due', 'sales','pay','date'));
    }

    public function yearlySales()
    {
        $date = date('Y');
        $total = DB::table('orders')->where('year', $date)->sum('total');
        $pay = DB::table('orders')->where('year', $date)->sum('pay');
        $due = DB::table('orders')->where('year', $date)->sum('due');

        $sales =DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')
                ->where('year',$date)
                ->get();
        return view('salesReports.year', compact('total', 'due', 'sales','pay','date'));
    }

    public function allSales()
    {
        $total = DB::table('orders')->sum('total');
        $pay = DB::table('orders')->sum('pay');
        $due = DB::table('orders')->sum('due');

        $sales =DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')
                ->get();
        return view('salesReports.list', compact('total', 'due', 'sales','pay'));
    }

}
