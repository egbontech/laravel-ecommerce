@extends('layouts.app')

@section('title','Categories')

@section('content')

<div class="py-5">
    <h1 style="text-align: center;font-weight:600;color:#185;margin:20px;margin-bottom:30px">All Categories</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
         @foreach($categories as $category)
                 <div class="col-md-3 mb-3">
                     <a href="{{url('category/'.$category->slug)}}" style="text-decoration: none;color:#191919;">
                     <div class="card">
                        <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="product image">                                       
                       
                        <div class="card-body">
                            <h3 style="text-align: center">{{$category->name}}</h3>
                            <p style="text-align: center">{{$category->description}}</p>                            
                        </div>
                
                    </div>
                    </a>
                 </div>
        @endforeach
         </div>
        </div>
      </div>
    </div>
</div>
@endsection