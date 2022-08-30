<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\product;
use App\models\category;
use Illuminate\Support\Facades\file;

class ProductController extends Controller
{

    public function index()
    {
        $products = product::all();
        return view('admin.product.index',compact('products'));
    }


    public function create()
    {
        $category = category::all();
        return view('admin.product.create',compact('category'));
    }


    public function store(Request $request)
    {
        $product = new product();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->small_description = $request->input('small_description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == true ? '1' : '0';
        $product->trending = $request->input('trending') == true ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->save();
        return redirect('admin/products')->with('message','Product created successfully');

    }



    public function edit($id)
    {
        $product = product::find($id);
        return view('admin.product.edit',compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = product::find($id);
        if($request->hasFile('image'))
        {
            $destination = 'assets/uploads/product/'.$product->image;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->small_description = $request->input('small_description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == true ? '1' : '0';
        $product->trending = $request->input('trending') == true ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->update();
        return redirect('admin/products')->with('message','Product updated successfully');


    }


    public function destroy($id)
    {
        $product = product::find($id);
        if($product->image)
        {
            $destination = 'assets/uploads/product/'.$product->image;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
        }
            $product->delete();
            return redirect('admin/products')->with('message','product deleted succesfully');
    }
}
