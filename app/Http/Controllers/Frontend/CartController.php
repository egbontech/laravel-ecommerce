<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\product;
use App\models\user;
use App\models\category;
use App\models\cart;

class CartController extends Controller
{
    public function addTocart(Request $request)
    {
      $product_id = $request->input('product_id');
      $product_qty = $request->input('product_qty');
      $user = user::where('id',Auth::id())->first();
      if(Auth::check())
      {
          $product_check = product::where('id',$product_id)->first();
          if($product_check)
          {
              if(cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
              {
                return response()->json(['message' => 'You have added this item to your cart '.$user->name]);
              }
              else
              {
                $cartitem = new cart();
                $cartitem->product_id = $product_id;
                $cartitem->user_id = Auth::id();
                $cartitem->product_qty = $product_qty;
                $cartitem->save();
                return response()->json(['message' => $product_check->name.' Added to cart']);
              }

          }
      }
      else
      {
          return response()->json(['message' => 'Login to continue']);
      }
    }
    public function viewcart()
    {
        $cartitems = cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartitems'));
    }
    public function destroy(Request $request)
    {
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            if(cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                $cartitem = cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();
                return response()->json(['message' => 'Product Deleted Succesfully']);
            }
        }
        else
        {
            return response()->json(['message' => 'Login to continue']);
        }

    }
    public function update(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_quantity = $request->input('product_qty');

        if(Auth::check())
        {
            if(cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                $cart = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cart->product_qty = $product_quantity;
                $cart->update();
                return response()->json(['message' => 'Quantity updated']);
            }
        }
    }
    public function loadcart()
    {
        $countcart = cart::where('user_id',Auth::id())->count();
        return response()->json(['count' => $countcart]);
    }
}
