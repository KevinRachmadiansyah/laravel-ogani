<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Stripe;

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
        $totalOrder=Order::all()->count();
        $totalRevenue=Order::all()->sum('price');
        $totalSales=Order::all()->sum('quantity');
        $totalCheckout=Order::where('payment_status','=','Paid')->count();
        if($usertype=='1'){
            return view('admin.home');
        }
        else if($usertype=='2'){
            return view('supplier.home', compact('totalOrder','totalRevenue','totalSales','totalCheckout'));
        }
        else{
            return view('user.home', compact('product'));
        }
    }

    public function showShops(){
        $totalProduct=Product::all()->count();
        $product = Product::all();
        return view('user.shop', compact('product','totalProduct'));
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

    public function cashOrder(){

        $user = Auth::user();
        $userId = $user->id;
        // dd($userId);
        $data = Cart::where('user_id', '=', $userId)->get();
        // dd($data);
        foreach($data as $data){
            $order= new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_name = $data->product_name;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status='cod';
            $order->delivery_status='process';

            $order->save();

            $cart_id = $data->id;
            $cart= Cart::find($cart_id);
            $cart->delete();
        }

        $query = DB::table('products')
        ->where('id',$order->product_id);

        $query->decrement('qty', $order->quantity);

        return redirect()->route('detail.transaction')->with('message','Your Orders has been Processed. We will get in touch soon...');

    }

    public function stripe($totalPrice){

        return view('user.stripe', compact('totalPrice'));
    }

    public function stripePost(Request $request, $totalPrice)
    {
        // dd($totalPrice);
        Stripe\Stripe::setApiKey("sk_test_51NEW0FAZqqoOqzdmDi37Px7nZui9hLKWTw5CAiCMfvRpoSAuWOgFdgUhRZVW8lLtUVWW2p8wLV2q1Th2n8M1jXKP00zfSTLWFY");

        Stripe\Charge::create ([
                "amount" => $totalPrice * 100,
                "currency" => "idr",
                "source" => $request->stripeToken,
                "description" => "Thanks for Order from Us!"
        ]);

        $user = Auth::user();
        $userId = $user->id;
        // dd($userId);
        $data = Cart::where('user_id', '=', $userId)->get();
        // dd($data);
        foreach($data as $data){
            $order= new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_name = $data->product_name;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status='Paid';
            $order->delivery_status='process';

            $order->save();

            $cart_id = $data->id;
            $cart= Cart::find($cart_id);
            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');
        $query = DB::table('products')
        ->where('id',$order->product_id);

        $query->decrement('qty', $order->quantity);

        return redirect()->route('detail.transaction')->with('message','Your Orders has been Processed. We will get in touch soon...');
    }

    public function destroyItem($id){
        $cart = Cart::where('id',$id)->first();
        // $cart->delete();
        if ($cart != null) {
            $cart->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function getTransactions(){
        $sessionId = Auth::user()->id;

        return view ('user.transactions', [
            'orders' => DB::table('orders')->where('user_id', '=', $sessionId)
                                                 ->where('delivery_status', '=', 'process')->get()
        ]);
    }

    public function getHistory(){
        $sessionId = Auth::user()->id;

        return view ('user.history', [
            'orders' => DB::table('orders')->where('user_id', '=', $sessionId)
                                                 ->where('delivery_status', '=', 'done')->get()
        ]);
    }


}
