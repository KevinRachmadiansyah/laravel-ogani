<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class SupplierController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $product = Product::all();
        return view('supplier.products.index', compact('product'));
    }
    public function add(){
        return view('supplier.products.add');
    //
    }
    public  function edit($id){
        $product = Product::whereId($id)->first();
        // dd($data);
        return view ('supplier.products.edit', compact('product'));
    }
    public function getCategory(){
        return view('category.home');
    }

    public function manageProducts($id){

        $product = Product::all();
        return view('supplier.products.index',  compact('product'));
    }
    public function showDashboard(){
        return view('supplier.home');
    }
    public function store( Request $request){
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'nullable',
            'qty' => 'required',
            'price' => 'required',
            'discount' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $image = $request->file('image')->store('images', 'public');

        Product::create([
            'name' =>$request->input('name'),
            'desc' =>$request->input('desc'),
            'image' =>$image,
            'qty' =>$request->input('qty'),
            'price' =>$request->input('price'),
            'discount' => $request->input('discount'),
        ]);
        return redirect()->route('products')
        ->with('success', 'Products succesfully added');
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'nullable',
            'qty' => 'required',
            'price' => 'required',
            'discount' => 'required'
        ]);
    //    dd($validatedData);

        $test = Product::where('id', $id)
        ->update($validatedData);


        return redirect()->route('products')
        ->with('success', 'Data Berhasil diupdate');

    }

    public function showOrder(){
        $id = Auth::user()->id;
        $order = Order::get('*');
        return view('supplier.products.order', compact('order'));
    }

    public function destroyOrder($id)
    {

        $data = Order::where('id', $id)->first();
        // dd($product);
        if ($data == null) {
            return redirect()->back();
        }

        $data->delete();

        return redirect()->back();
    }

    public function destroy($id)
    {

        $data = Product::where('id', $id)->first();
        // dd($product);
        if ($data == null) {
            return redirect()->back();
        }

        $data->delete();

        return redirect()->back();;
    }

}
