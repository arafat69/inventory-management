<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')
                ->leftJoin('categories','products.category_id','categories.id')
                ->select('products.*','categories.cat_name')
                ->get();
        $customer = Customer::all();
        $category = Category::all();
        return view('pos.pos',compact('product','customer','category'));
    }


    public function pendingOrder()
    {
        $pending = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')
                ->where('order_status','Pending')
                ->get();
        return view('pos.pending_order',compact('pending'));
    }

    public function viewOrder($id)
    {
        $order = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.*','orders.*')
                ->where('orders.id',$id)
                ->first();
        $order_details = DB::table('orderdetails')
                      ->join('products','orderdetails.product_id','products.id')
                      ->select('orderdetails.*','products.product_name','products.product_code')
                      ->where('order_id',$id)
                      ->get();
        return view('pos.order_confirmation',compact('order','order_details'));
    }

    public function orderDone($id)
    {
        $date= date('M d, Y');
        $data=[
            'order_status'=>'Success',
            'delivery_date' => $date
        ];
       $order = DB::table('orders')->where('id',$id);
       $order->update($data);
        session()->flash('message','Products Delivery Successfull');
        return redirect()->route('pending.order');
    }

    public function deliveryOrder()
    {
        $delivery = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')
                ->where('order_status','Success')
                ->get();
        return view('pos.delivery_order',compact('delivery'));
    }

    public function payAmount(Request $request,$id)
    {
        $amount =DB::table('orders')->where('id',$id)->first();

        $pay = $amount->pay + $request->pay;

        $due = $amount->due - $request->pay;
        if ($due < 0) {
            $due = 0;
        }
        $arr =[
            'pay'=>$pay,
            'due'=>$due
        ];
        $update = DB::table('orders')->where('id',$id)->update($arr);
        if ($update) {
            session()->flash('message','Payment Updated Successfull');
            return redirect()->back();
        }
    }

    public function deleteOrder($id)
    {
        DB::table('orders')->where('id',$id)->delete();
        DB::table('orderdetails')->where('order_id',$id)->delete();
        session()->flash('message','Order Deleted Successfull');
        return redirect()->route('pending.order');
    }
}
