<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\order;
class OrderController extends Controller
{
    public function index()
    {
        $orders = order::where('status','0')->get();
        return view('admin.orders.index',compact('orders'));
    }
    public function view($id)
    {
        $orders = order::where('id',$id)->first();
        return view('admin.orders.view',compact('orders'));
    }
  
    public function update(Request $request,$id)
    {
       $orders = order::find($id);
       $orders->status = $request->input('order_status');
       $orders->update();
       return redirect('admin/orders')->with('message','Order updated succesfully');

    }
    public function history()
    {
        $orders = order::where('status','1')->get();
        return view('admin.orders.history',compact('orders'));
    }
}
