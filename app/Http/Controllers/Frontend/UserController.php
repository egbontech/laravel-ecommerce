<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\order;
use App\models\item;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function index()
   {
       $orders = order::where('user_id',Auth::id())->where('status','0')->orderBy('created_at','desc')->get();
       return view('frontend.orders.index',compact('orders'));
   }
   public function view($id)
   {
     $orders = order::where('id',$id)->where('user_id',Auth::id())->first();
     return view('frontend.orders.view',compact('orders'));
   }
   public function destroy($id)
   {
     $order = order::find($id);
     $order->delete();
     return redirect('admin/order-history')->with('message','Deleted succesfully');
   }
}
