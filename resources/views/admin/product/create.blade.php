@extends('layouts.admin')

@section('title','add-category')

@section('content')


    
<div class="card">
    <div class="card-header">
        <h2>Add Product</h2>
    </div>
    <div class="card-body">
        <form action="{{url('admin/store-product')}}"method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label>Select a category</label>
                <select name="cate_id" class="form-select">
                    
                    @foreach($category as $item)

                    <option value="{{$item->id}}">{{$item->name}}</option>
                    
                    @endforeach
                </select>
                <div class="mb-2">
                    <label class="mb-2">Name</label>
                    <input type="text" class="form-control" name="name"required>
                </div>      
                <div class="mb-2">
                    <label class="mb-2">Slug</label>
                    <input type="text" class="form-control" name="slug"required>
                </div>     
                  
                <div class="mb-2">
                    <label class="mb-2">Small Description</label>
                    <textarea type="text" class="form-control"name="small_description" rows="3"required></textarea>
                </div>               
                <div class="mb-2">
                    <label class="mb-2">Description</label>
                    <textarea type="text" class="form-control"name="description" rows="3"required></textarea>
                </div>               
                <div class="mb-2  col-md-6">
                    <label class="mb-2" >Selling Price</label>
                    <input type="number"  name="selling_price"class="form-control"required>
                </div>  
                <div class="mb-2 col-md-6">
                    <label class="mb-2" >Original Price</label>
                    <input type="number"  name="original_price"class="form-control"required>
                </div>  
                <div class="mb-2 col-md-6">
                    <label class="mb-2" >Tax</label>
                    <input type="number"  name="tax"class="form-control"required>
                </div>  
                <div class="mb-2  col-md-6">
                    <label class="mb-2" >Quantity</label>
                    <input type="number"  name="qty"class="form-control"required>
                </div>  
                <div class="mb-2">
                    <label class="mb-2" >Status</label>
                    <input type="checkbox"  name="status">
                </div>  
                <div class="mb-2">
                    <label class="mb-2" >Trending</label>
                    <input type="checkbox"  name="trending">
                </div>                
                <div class="mb-2">
                    <label class="mb-2">meta_title</label>
                    <input type="text" class="form-control" name="meta_title"required>
                </div>   
                <div class="mb-2">
                    <label class="mb-2">Meta_description</label>
                    <textarea type="text" class="form-control"name="meta_description" rows="2"required></textarea>
                </div>
                <div class="mb-2">
                    <label class="mb-2">Meta_keywords</label>
                    <textarea type="text" class="form-control"name="meta_keywords" rows="2"required></textarea>
                </div>
                <div class="mb-2">
                    <label class="mb-2" >Image</label>
                    <input type="file" name="image" class="form-control">
                </div>  
                <div class="mt-2">
                <button type="submit" class="btn btn-secondary">Submit</button>
                </div>                
            </div>            
        
        </form>     
    </div>
</div>


@endsection