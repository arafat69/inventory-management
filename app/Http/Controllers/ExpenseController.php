<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($month = null)
    {
        $date = date('F');
        if ($month != null) {
            $date = $month;
        }
        $months = Expense::where('month',$date)->orderBy('id','desc')->get();
        $total = DB::table('expenses')->where('month',$date)->sum('amount');
        return view('expense.month',compact('months','total','date'));
        echo $date;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('Y');
        $years = Expense::where('year',$date)->orderBy('id','desc')->get();
        $total = DB::table('expenses')->where('year',$date)->sum('amount');
        return view('expense.year',compact('years','total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense = new Expense();
        $expense->details = $request->details;
        $expense->amount = $request->amount;
        $expense->month = $request->month;
        $expense->year = $request->year;
        $expense->date = $request->date;
        $expense->save();
        session()->flash('message','Expense Added Successfull');
        return redirect()->route('today');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        $date = date('d/m/Y');
        $today = Expense::where('date',$date)->orderBy('id','desc')->get();
        $totalExpense = DB::table('expenses')->where('date',$date)->sum('amount');
        return view('expense.today',compact('today','totalExpense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('expense.edit',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->details = $request->details;
        $expense->amount = $request->amount;
        $expense->month = $request->month;
        $expense->year = $request->year;
        $expense->date = $request->date;
        $expense->save();
        session()->flash('message','Expense Updated Successfull');
        return redirect()->route('today');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expense::destroy($id);
        session()->flash('message','Deleted Expense Successfull');
        return redirect()->back();
    }

    public function expenseList()
    {
        $expenses = Expense::all();
        return view('expense.list',compact('expenses'));
    }
}
