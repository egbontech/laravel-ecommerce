<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\product;
use App\models\category;
use App\models\cart;

class FrontendController extends Controller
{
    public function index()
    {
        $featuredproducts = product::where('trending','1')->take(8)->get();
        $categories = category::all();
        $newproducts = product::orderBy('created_at','desc')->take(8)->get();
        return view('frontend.index',compact('featuredproducts','categories','newproducts'));
    }
    public function category()
    {
        $categories = category::where('status','0')->get();
        return view('frontend.category',compact('categories'));
    }
    public function products($slug)
    {if(category::where('slug',$slug)->exists())
        {
            $category = category::where('slug',$slug)->first();
            $products = product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('category','products'));
        }
        else
        {
            return redirect('/')->with('message','not found');
        }

    }
    public function show($category_slug,$product_slug)
    {
        if(category::where('slug',$category_slug)->exists())
        {
            if(product::where('slug',$product_slug)->exists())
            {
                $product = product::where('slug',$product_slug)->first();
                return view('frontend.products.show',compact('product'));
            }
            else
            {
                return redirect('/')->with('message','No products found');
            }
        }
        else
        {
            return redirect('/')->with('message','No category found');
        }

    }
    public function ajax()
    {
        $products = product::select('name')->where('status','0')->get();

        $data = [];

        foreach($products as $product)
        {
            $data[] = $product['name'];
        }
        return $data;
    }
    public function search(Request $request)
    {
      $searched_products = $request->product_name;
      if($searched_products != "")
      {
          $product = product::where("name","LIKE","%$searched_products%")->first();
          if($product)
          {
              return redirect('category/'.$product->category->slug.'/'.$product->slug);
          }
          else
          {
              return redirect()->back()->with('message','No Products Matched Your Search');
          }
      }

      else
      {
          return redirect()->back();
      }
    }
    public function download(Request $request,$image)
    {
        return response()->download(public_path('assets/uploads/product/'.$image));
    }

}
