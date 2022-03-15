<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.list',compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        $this->validate($request,[
            'photo'=>'required',
            'email'=>'unique:suppliers',
            'phone'=>'unique:suppliers',
        ]);

        $file_name = '';
        if ($request->photo != '') {
            $path = public_path('uploads/supplier/');
            $extension = $request->photo->getClientOriginalExtension();
            $file_name = date('d_m_Y_').time().'.'.$extension;
            $request->photo->move($path,$file_name);
        }

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->type = $request->type;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->branch_name = $request->branch_name;
        $supplier->city = $request->city;
        $supplier->photo = $file_name;
        $supplier->save();
        $request->session()->flash('message','Supplier Added Successfull');
        return redirect()->route('supplier');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
        $supplier =Supplier::find($id);
        if ($request->photo != '') {
            $path = public_path('uploads/supplier/');
            unlink($path.$supplier->photo);
            $extension = $request->photo->getClientOriginalExtension();
            $file_name = date('d_m_Y_').time().'.'.$extension;
            $request->photo->move($path,$file_name);
            $supplier->photo = $file_name;
        }

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->type = $request->type;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->branch_name = $request->branch_name;
        $supplier->city = $request->city;
        $supplier->save();
        $request->session()->flash('message','Supplier Updated Successfull');
        return redirect()->route('supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier=Supplier::find($id);
        $path = public_path('uploads/supplier/');
        unlink($path.$supplier->photo);
        $supplier->delete();
        session()->flash('message','Supplier Delete Successfull');
        return redirect()->back();
    }

}
