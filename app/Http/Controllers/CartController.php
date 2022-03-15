<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'weight' => $request->weight,
        ];
        Cart::setGlobalTax(2);
        $add = Cart::add($data);
        if ($add) {
            session()->flash('message', 'Product Added');
            return redirect()->back();
        }
    }

    public function cartUpdate(Request $request, $rowId)
    {
        $qty = $request->qty;
        $update = Cart::update($rowId, $qty);
        if ($update) {
            session()->flash('message', 'Update Successfully');
            return redirect()->back();
        }
    }

    public function CartRemove(Request $request, $rowId)
    {
        $delete = Cart::remove($rowId);
        $request->session()->flash('message', 'Remove Product Successfully');
        return redirect()->back();
    }

    public function invoice(Request $request)
    {
        $this->validate($request,[
            'customer' => 'required'
        ]);

        $cus_id = $request->customer;
        $customer = Customer::where('id',$cus_id)->first();
        $contents = Cart::content();
        return view('pos.invoice',compact('contents','customer'));
    }

    public function finalInvoice(Request $request)
    {
        $data = [
            'customer_id'=>$request->customer_id,
            'order_date'=>$request->order_date,
            'month'=> date('F'),
            'year'=>date('Y'),
            'order_status'=>$request->order_status,
            'total_products'=>$request->total_product,
            'sub_total'=>$request->sub_total,
            'vat'=>$request->vat,
            'total'=>$request->total,
            'payment_status'=>$request->payment_status,
            'pay'=>$request->pay,
            'due'=>$request->due,
        ];
        $order_id = DB::table('orders')->insertGetId($data);

        $contents = Cart::content();
        $odata = array();
        foreach($contents as $content){
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $content->id;
            $odata['quantity'] = $content->qty;
            $odata['unitcast'] = $content->price;
            $odata['total'] = $content->total;
            $insert = DB::table('orderdetails')->insert($odata);
        }
        if ($insert) {
            session()->flash('message', 'Successfully Invoice Created | Please delever the products and accept status');
            Cart::destroy();
            return redirect()->route('pending.order');
        }else{
            session()->flash('error', 'Error Exeption');
            return redirect()->back();
        }

    }


}
