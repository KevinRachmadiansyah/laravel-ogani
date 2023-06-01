<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::all();
        return view('landing.index', compact('product'));
    }
    public function redirect(){
        $product=Product::all();
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else if($usertype=='2'){
            return view('supplier.home');
        }
        else{
            return view('user.home', compact('product'));
        }
    }
    public function add_item(Request $request, $id){
        $user = Auth::user();
        // dd($user);
        $product=Product::find($id);
        // dd($product);
        $cart = new Cart;
        $cart->name = $user->name;
        $cart->email = $user->email;
        $cart->phone = $user->phone;
        $cart->address = $user->address;
        $cart->user_id = $user->id;

        $cart->product_name=$product->name;
        if($product->discount != null){
            $cart->price=$product->discount * $request->quantity;
        }
        else{
            $cart->price=$product->price * $request->quantity;
        }
        // $cart->price=$product->price;
        $cart->image=$product->image;
        $cart->product_id=$product->id;

        $cart->quantity=$request->quantity;
        $cart->save();

        return redirect()->back();
    }
    public function showItem(){
        $id = Auth::user()->id;
        $cart = Cart::where('user_id','=',$id)->get();
        return view('user.cart', compact('cart'));

    }

    public function destroyItem($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
}
