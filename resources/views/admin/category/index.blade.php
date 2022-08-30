@extends('layouts.admin')

@section('title','categories')


@section('content')

    <div class="card">
        <div class="card-header">
           
            <h2>Categories
                <a href="{{url('admin/add-category')}}" class="btn btn-secondary float-end">Add Category</a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                       
                    </tr>                    
                </thead>    
                <tbody>
                    @foreach ($categories as $category)                      
                
                    <tr>
                        <td>{{$category->id}}</td>                        
                        <td>{{$category->name}}</td>                        
                        <td>{{$category->description}}</td>                        
                        <td>
                            <img src="{{asset('assets/uploads/category/'. $category->image)}}" alt="img" height="70px"width="80px">
                        </td>                        
                        <td>
                            <a href="{{url('admin/edit-category/'.$category->id)}}" class="btn btn-secondary">Edit</a>
                            <a href="{{url('admin/delete-category/'.$category->id)}}" class="btn btn-danger">Delete</a>
                        </td>                        
                                            
                                               
                    </tr>     
                    @endforeach             
                </tbody>            
            </table>         
        </div>
    </div>
@endsection