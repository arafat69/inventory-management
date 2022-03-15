<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = date('F', strtotime('-1 months'));
        $year = date('Y');

        $salary = DB::table('employees')->leftJoin('advance_salary', function ($leftJoin) {
            $leftJoin->on('advance_salary.employee_id', '=', 'employees.id')
                ->where('advance_salary.month', '=', date('F', strtotime('-1 months')))
                ->where('advance_salary.year', '=', date('Y'));
             })
            ->get();
        return view('salary.pay', compact('salary'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $arr = [
            'employee_id' => $id,
            'salary_month' => $request->month,
            'salary_year' => $request->year,
            'paid_salary' => $request->pay_salary,
            'advance_id' => $request->advance_id
        ];
        $insert = DB::table('salaries')->insert($arr);
        if ($insert) {
            session()->flash('message', 'Salary Pay Successfull');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        $salary = DB::table('salaries')
            ->leftJoin('advance_salary', 'salaries.advance_id', 'advance_salary.id')
            ->join('employees', 'salaries.employee_id', 'employees.id')
            ->select('salaries.*', 'employees.name', 'employees.photo', 'employees.salary', 'advance_salary.*', 'salaries.id as salary_id')
            ->get();
        return view('salary.list', compact('salary'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('salaries')->where('id', $id)->delete();
        session()->flash('message', 'Salary Delete Successfull');
        return redirect()->back();
    }
}
