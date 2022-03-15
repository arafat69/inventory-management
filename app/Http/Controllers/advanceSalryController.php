<?php

namespace App\Http\Controllers;

use App\Http\Requests\advanceSalaryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class advanceSalryController extends Controller
{

    public function advanceSalary()
    {
        $employees = DB::table('employees')->get();
        return view('advance_salary.add_advance', compact('employees'));
    }

    public function storeAdvanceSalary(advanceSalaryRequest $request)
    {
        $emp_id = $request->employee_id;
        $month = $request->month;
        $year = $request->year;

        $advance = DB::table('advance_salary')
            ->where('employee_id', $emp_id)
            ->where('month', $month)
            ->where('year', $year)
            ->first();

        if ($advance === null) {
            $data = [
                'employee_id' => $request->employee_id,
                'month' => $request->month,
                'advanced_salary' => $request->advanced_salary,
                'year' => $request->year
            ];
            $insert = DB::table('advance_salary')->insert($data);
            if ($insert) {
                session()->flash('message', 'Advance Salary Added Successfull');
                return redirect()->route('advanceSalary');
            }
        } else {
            session()->flash('error', 'Oops !! Already Advance Salary Paid in this month !');
            return redirect()->back();
        }
    }

    public function indexAdvanceSalary()
    {
        $month = date("F",strtotime('-1 months'));
        $advance = DB::table('advance_salary')
            ->Join('employees', 'advance_salary.employee_id', 'employees.id')
            ->select('advance_salary.*', 'employees.name', 'employees.salary', 'employees.photo')
            ->orderBy('id', 'DESC')
            ->get();
        return view('advance_salary.advance_salary_list', compact('advance'));
    }

    public function editAdvanceSalary($id)
    {
        $advance = DB::table('advance_salary')->where('id', $id)->first();
        $employees = DB::table('employees')->get();
        return view('advance_salary.edit', compact('advance', 'employees'));
    }

    public function updateAdvanceSalary(advanceSalaryRequest $request, $id)
    {
        $data = [
            'employee_id' => $request->employee_id,
            'month' => $request->month,
            'advanced_salary' => $request->advanced_salary,
            'year' => $request->year
        ];
        $update = DB::table('advance_salary')
            ->where('id', $id)
            ->update($data);
        if ($update) {
            session()->flash('message', 'Advance Salary Update Successfull');
            return redirect()->route('advanceSalary');
        }
    }

    public function deleteAdvanceSalary($id)
    {
        DB::table('advance_salary')
            ->where('id', $id)
            ->delete();
        session()->flash('message', 'Advance Salary Deleted Successfull');
        return redirect()->route('advanceSalary');
    }
}
