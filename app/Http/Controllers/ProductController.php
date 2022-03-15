<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Http\Requests\ProductRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
                ->leftJoin('suppliers','products.supplier_id','suppliers.id')
                ->select('products.*','categories.cat_name as category','suppliers.name as supplier')
                ->get();
        return view('product.list', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->validate($request, [
            'product_image' => 'required',
            'product_code' => 'unique:products'
        ]);

        $file_name = '';
        if ($request->product_image != '') {
            $path = public_path('uploads/product/');
            $extension = $request->product_image->getClientOriginalExtension();
            $file_name = date('d_m_Y_') . time() . '.' . $extension;
            $request->product_image->move($path, $file_name);
        }

        $product = new Product();
        $product->product_name   =  $request->product_name;
        $product->category_id    =  $request->category_id;
        $product->supplier_id    =  $request->supplier_id;
        $product->product_code   =  $request->product_code;
        $product->product_garage =  $request->product_garage;
        $product->product_route  =  $request->product_route;
        $product->buy_date       =  $request->buy_date;
        $product->expire_date    =  $request->expire_date;
        $product->buying_price   =  $request->buying_price;
        $product->selling_price  =  $request->selling_price;
        $product->product_image  =  $file_name;
        $product->save();
        $request->session()->flash('message', 'product Added Successfull');
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $category = Category::all();
        $supplier = Supplier::all();
        return view('product.add', compact('category', 'supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $supplier = Supplier::all();
        $product = Product::find($id);
        return view('product.edit', compact('category', 'supplier', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $product = Product::find($id);

        if ($request->product_image != '') {
            $path = public_path('uploads/product/');
            unlink($path . $product->product_image);
            $extension = $request->product_image->getClientOriginalExtension();
            $file_name = date('d_m_Y_') . time() . '.' . $extension;
            $request->product_image->move($path, $file_name);
            $product->product_image = $file_name;
        }

        $product->product_name   =  $request->product_name;
        $product->category_id    =  $request->category_id;
        $product->supplier_id    =  $request->supplier_id;
        $product->product_code   =  $request->product_code;
        $product->product_garage =  $request->product_garage;
        $product->product_route  =  $request->product_route;
        $product->buy_date       =  $request->buy_date;
        $product->expire_date    =  $request->expire_date;
        $product->buying_price   =  $request->buying_price;
        $product->selling_price  =  $request->selling_price;
        $product->save();
        $request->session()->flash('message', 'product Update Successfull');
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $path = public_path('uploads/product/');
        unlink($path . $product->product_image);
        $product->delete();
        session()->flash('message', 'Product Delete Successfull');
        return redirect()->back();
    }


    ///product import and export
    public function importProduct()
    {
        return view('product.import_product');
    }


    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import(Request $request)
    {
        $import = Excel::import(new productsImport, $request->file('import_file'));
        if ($import) {
            session()->flash('message', 'Product Import Successfull');
            return redirect()->route('product');
        }
    }
}
