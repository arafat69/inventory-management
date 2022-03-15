<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendence = employee::all();
        return view('attendence.add', compact('attendence'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($date)
    {
        $attendence = Attendence::where('add_date',$date)
                    ->join('employees','attendences.employee_id','employees.id')
                    ->select('employees.name','employees.photo','attendences.*')
                    ->get();
        return view('attendence.view',compact('attendence','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('d/m/Y');
        $add_date = date('d_m_Y');
        $data = Attendence::where('att_date', $date)->first();
        if ($data) {
            session()->flash('error', 'Oops !! Today Attendance Already Take');
            return redirect()->back();
        } else {
            foreach ($request->employee_id as $id) {
                $data[] = [
                    'employee_id' => $id,
                    'attendence' => $request->attendence[$id],
                    'att_date' => $request->att_date,
                    'att_year' => $request->att_year,
                    'month' => $request->month,
                    'add_date' => $add_date,
                ];
            }
            DB::table('attendences')->insert($data);
            session()->flash('message', 'Attendence Added Successfull');
            return redirect()->route('attendence');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show(Attendence $attendence)
    {
        $add_date = Attendence::select('add_date','month')->groupBy('add_date','month')->get();
        return view('attendence.list',compact('add_date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit($date)
    {
        $attendence = Attendence::where('add_date',$date)
                    ->join('employees','attendences.employee_id','employees.id')
                    ->select('employees.name','employees.photo','attendences.*')
                    ->get();
        return view('attendence.edit',compact('attendence','date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $date)
    {
        foreach ($request->id as $id) {
            $attendence = Attendence::where('add_date',$date)->where('id',$id)->first();
            $attendence->attendence = $request->attendence[$id];
            $attendence->save();
        }
        session()->flash('message', 'Attendence Updated Successfull');
            return redirect()->route('attendence');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy($date)
    {
        Attendence::where('add_date',$date)->delete();
        session()->flash('message', 'Attendence Deleted Successfull');
        return redirect()->route('attendence');
    }
}
