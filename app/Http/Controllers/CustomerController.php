<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view('customer.list',compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $this->validate($request,[
            'photo'=>'required',
            'email'=>'unique:customers|max:50'
        ]);

        $file_name = '';
        if ($request->photo != '') {
            $path = public_path('uploads/customer/');
            $extension = $request->photo->getClientOriginalExtension();
            $file_name = date('d_m_Y_').time().'.'.$extension;
            $request->photo->move($path,$file_name);
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shopename = $request->shopename;
        $customer->account_holder = $request->account_holder;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;
        $customer->bank_branch = $request->bank_branch;
        $customer->city = $request->city;
        $customer->photo = $file_name;
        $customer->save();
        $request->session()->flash('message','customer Added Successfull');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request,$id)
    {
        $customer =Customer::find($id);
        if ($request->photo != '') {
            $path = public_path('uploads/customer/');
            unlink($path.$customer->photo);
            $extension = $request->photo->getClientOriginalExtension();
            $file_name = date('d_m_Y_').time().'.'.$extension;
            $request->photo->move($path,$file_name);
            $customer->photo = $file_name;
        }

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shopename = $request->shopename;
        $customer->account_holder = $request->account_holder;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;
        $customer->bank_branch = $request->bank_branch;
        $customer->city = $request->city;
        $customer->save();
        $request->session()->flash('message','Customer Updated Successfull');
        return redirect()->route('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::find($id);
        $path = public_path('uploads/customer/');
        unlink($path.$customer->photo);
        $customer->delete();
        session()->flash('message','Customer Delete Successfull');
        return redirect()->back();
    }
}
