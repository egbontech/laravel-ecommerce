@extends('layouts.admin')

@section('title','Edit-category')

@section('content')
    
<div class="card">
    <div class="card-header">
        <h2>Edit Category</h2>
    </div>
    <div class="card-body">
        <form action="{{url('admin/update-category/'.$category->id)}}"method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-2">
                    <label class="mb-2">Name</label>
                    <input type="text" class="form-control" name="name"value="{{$category->name}}"required >
                </div>      
                <div class="mb-2">
                    <label class="mb-2">Slug</label>
                    <input type="text" class="form-control" name="slug"value="{{$category->slug}}"required>
                </div>      
                <div class="mb-2">
                    <label class="mb-2">Description</label>
                    <textarea type="text" class="form-control"name="description" rows="3"required>{{$category->description}}</textarea>
                </div>
                <div class="mb-2">
                    <label class="mb-2" >Status</label>
                    <input type="checkbox"{{$category->status == "1" ? 'checked' : ''}}  name="status">
                </div>  
                <div class="mb-2">
                    <label class="mb-2">Popular</label>
                    <input type="checkbox" name="popular"{{$category->popular == "1" ? 'checked' : ''}}>
                </div>  
                <div class="mb-2">
                    <label class="mb-2">meta_title</label>
                    <input type="text" class="form-control" name="meta_title"value="{{$category->meta_title}}"required>
                </div>   
                <div class="mb-2">
                    <label class="mb-2">Meta_description</label>
                    <textarea type="text" class="form-control"name="meta_description" rows="2"required>{{$category->meta_description}}</textarea>
                </div>
                <div class="mb-2">
                    <label class="mb-2">Meta_keywords</label>
                    <textarea type="text" class="form-control"name="meta_keywords" rows="2"required>{{$category->meta_keywords}}</textarea>
                </div>
                @if($category->image)
                    <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="" height="700px" width="50px">
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