@extends('layouts.admin')

@section('title','Edit-product')

@section('content')


    
<div class="card">
    <div class="card-header">
        <h2>Edit Product</h2>
    </div>
    <div class="card-body">
        <form action="{{url('admin/update-product/'.$product->id)}}"method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="row">
                 <label>Select a category</label>
                <select class="form-select">            

               <option value="">{{$product->category->name}}</option>
                 
                </select>
                <div class="mb-2">
                    <label class="mb-2">Name</label>
                    <input type="text" class="form-control" name="name"required value="{{$product->name}}">
                </div>      
                <div class="mb-2">
                    <label class="mb-2">Slug</label>
                    <input type="text" class="form-control" name="slug"required value="{{$product->slug}}" >
                </div>     
                  
                <div class="mb-2">
                    <label class="mb-2">Small Description</label>
                    <textarea type="text" class="form-control"name="small_description" rows="3"required>{{$product->small_description}}</textarea>
                </div>               
                <div class="mb-2">
                    <label class="mb-2">Description</label>
                    <textarea type="text" class="form-control"name="description" rows="3"required>{{$product->description}}</textarea>
                </div>               
                <div class="mb-2  col-md-6">
                    <label class="mb-2" >Selling Price</label>
                    <input type="number"  name="selling_price"class="form-control"required value="{{$product->selling_price}}">
                </div>  
                <div class="mb-2 col-md-6">
                    <label class="mb-2" >Original Price</label>
                    <input type="number"  name="original_price"class="form-control"required value="{{$product->original_price}}">
                </div>  
                <div class="mb-2 col-md-6">
                    <label class="mb-2" >Tax</label>
                    <input type="number"  name="tax"class="form-control"required value="{{$product->tax}}">
                </div>  
                <div class="mb-2  col-md-6">
                    <label class="mb-2" >Quantity</label>
                    <input type="number"  name="qty"class="form-control"required value="{{$product->qty}}">
                </div>  
                <div class="mb-2">
                    <label class="mb-2" >Status</label>
                    <input type="checkbox"  name="status" {{$product->status == "1" ? 'checked' : ''}}>
                </div>  
                <div class="mb-2">
                    <label class="mb-2" >Trending</label>
                    <input type="checkbox"  name="trending" {{$product->trending == "1" ? 'checked' : ''}}>
                </div>                
                <div class="mb-2">
                    <label class="mb-2">meta_title</label>
                    <input type="text" class="form-control" name="meta_title"required value="{{$product->meta_title}}" >
                </div>   
                <div class="mb-2">
                    <label class="mb-2">Meta_description</label>
                    <textarea type="text" class="form-control"name="meta_description" rows="2"required>{{$product->meta_description}}</textarea>
                </div>
                <div class="mb-2">
                    <label class="mb-2">Meta_keywords</label>
                    <textarea type="text" class="form-control"name="meta_keywords" rows="2"required>{{$product->meta_keywords}}</textarea>
                </div>
                @if($product->image)
                <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="" height="700px" width="600px">
            @endif
                <div class="mb-2">
                    <label class="mb-2" >Image</label>
                    <input type="file" name="image" class="form-control">
                </div>  
                <div class="mt-2">
                <button type="submit" class="btn btn-secondary">Update</button>
                </div>                
            </div>            
        
        </form>     
    </div>
</div>


@endsection