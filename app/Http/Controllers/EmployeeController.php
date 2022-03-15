<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = employee::all();
        return view('employee.list',compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $this->validate($request,[
            'email' => 'unique:employees',
            'nid_no' => 'unique:employees',
            'photo' => 'required',
        ]);

        $file_name = '';
        if ($request->photo != '') {
            $path = public_path('uploads/employee/');
            $extension = $request->photo->getClientOriginalExtension();
            $file_name = date('d_m_Y_').time().'.'.$extension;
            $request->photo->move($path,$file_name);
        }

        $employee = new employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->experience = $request->experience;
        $employee->nid_no = $request->nid_no;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->photo = $file_name;
        $employee->save();
        $request->session()->flash('message','Employee Added Successfull');
        return redirect()->route('employee');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee,$id)
    {
        $employee = employee::find($id);
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {

        $employee =employee::find($id);
        if ($request->photo != '') {
            $path = public_path('uploads/employee/');
            unlink($path.$employee->photo);
            $extension = $request->photo->getClientOriginalExtension();
            $file_name = date('d_m_Y_').time().'.'.$extension;
            $request->photo->move($path,$file_name);
            $employee->photo = $file_name;
        }

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->experience = $request->experience;
        $employee->nid_no = $request->nid_no;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->save();
        $request->session()->flash('message','Employee Updated Successfull');
        return redirect()->route('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=employee::find($id);
        $path = public_path('uploads/employee/');
        unlink($path.$employee->photo);
        $employee->delete();
        session()->flash('message','Employee Delete Successfull');
        return redirect()->back();
    }


}
