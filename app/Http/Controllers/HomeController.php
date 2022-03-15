<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\employee;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = date('d/m/Y');
        $todaySale = DB::table('orders')->where('order_date', $date)->sum('total');
        $newOrder = DB::table('orders')->where('order_date', $date)->count();

        $pendingTotal = DB::table('orders')->where('order_status', 'Pending')->sum('total');
        $pendingorder = DB::table('orders')->where('order_status', 'Pending')->count();

        $m = date('F');
        $due = DB::table('orders')->where('month', $m)->sum('due');

        $category = Category::count();

        $product = Product::count();

        $customer = Customer::count();
        $employee = employee::count();
        $supplier = Supplier::count();

        $todayExpense = DB::table('expenses')->where('date', $date)->sum('amount');
        $Expense = DB::table('expenses')->where('date', $date)->count();

        $monthExpense = DB::table('expenses')->where('month', $m)->sum('amount');
        $Expensemonth = DB::table('expenses')->where('month', $m)->count();

        $array = [
            'todaySale' => $todaySale,
            'newOrder' => $newOrder,
            'pendingTotal' => $pendingTotal,
            'pendingorder' => $pendingorder,
            'due' => $due,
            'category' => $category,
            'product' => $product,
            'customer' => $customer,
            'employee' => $employee,
            'supplier' => $supplier,
            'todayExpense' => $todayExpense,
            'Expense' => $Expense,
            'monthExpense' => $monthExpense,
            'Expensemonth' => $Expensemonth
        ];

        return view('home', $array);
    }
}
