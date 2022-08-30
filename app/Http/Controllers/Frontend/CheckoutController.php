<?php

namespace App\Http\Controllers\Frontend;
use App\Models\cart;
use App\models\item;
use App\models\user;
use App\Models\order;
use App\models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = cart::where('user_id',Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!product::where('id',$item->product_id)->where('qty','>=',$item->product_qty)->exists())
            {
                $removeitem = cart::where('user_id',Auth::id())->where('product_id',$item->product_id)->first();
                $removeitem->delete();
            }
        }
        $cartitems = cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartitems'));
    }
    public function placeorder(Request $request)
    {
        $order = new order;
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('fname');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');

        $total = 0;
        $cartitems_total = cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $product)
        {
            $total += $product->products->selling_price * $product->product_qty;
        }
        $order->total_price = $total;
        $order->tracking_no = 'EgbonTech'.rand(1111,9999);
        $order->save();

        $order->id;

        $cartitems = cart::where('user_id',Auth::id())->get();

        foreach( $cartitems as $item)
        {
            item::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'qty' => $item->product_qty,
                'price' =>$item->products->selling_price,
            ]);
            $prod = product::where('id',$item->product_id)->first();
            $prod->qty = $prod->qty - $item->product_qty;
            $prod->update();

        }
        if(Auth::user()->address == NULL)
        {
            $user = user::where('id',Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        $cartitems = cart::where('user_id',Auth::id())->get();
        cart::destroy($cartitems);
        return redirect('order-detials')->with('message','Order was placed successfully have a nice day ahead');
    }
}
