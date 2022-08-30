<?php

namespace App\Http\Controllers\Admin;
use App\models\category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\file;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $category = new category();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;

        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == true ? '1' : '0';
        $category->popular = $request->input('popular') == true ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->save();
        return redirect('admin/categories')->with('message','Category created succesfully');
    }
    public function edit($id)
    {
        $category = category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $category =  category::find($id);
        if($request->hasFile('image'))
        {
            $destination = 'assets/uploads/category/'.$category->image;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == true ? '1' : '0';
        $category->popular = $request->input('popular') == true ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->update();
        return redirect('admin/categories')->with('message','category updated successfully');

    }
    public function destroy($id)
    {
        $category = category::find($id);
        if($category->image)
        {
            $destination = 'assets/uploads/category/'.$category->image;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
        }
            $category->prod()->delete();
            $category->delete();
            return redirect('admin/categories')->with('message','category with its products deleted succesfully');

    }
}
