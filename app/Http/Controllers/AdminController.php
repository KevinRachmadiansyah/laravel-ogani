<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    //
    public function showTransactions(){
        $order = Order::all();
        return view('admin.transactions', compact('order'));
    }
    public function delivery_status($id){
        $order = Order::find($id);
        $order->delivery_status = 'Done';
        $order->payment_status = 'Paid';
        $order->save();
        return redirect()->back();
    }
}
