@extends('layouts.admin')

@section('title','Users')


@section('content')

    <div class="card">
        <div class="card-header">
           
            <h2>User Detials 
                <a href="{{url('admin/users')}}"class="btn btn-secondary float-end">Back</a>            
            </h2>
            <hr>
           
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Role</label>
                                <div class="p-2 border">                                   
                                    {{$users->role_as == 0 ? 'Registered user' : 'Admin'}}
                                </div>
                                <label for="">First Name</label>
                                <div class="p-2 border">                                   
                                    {{$users->name}}
                                </div>
                                <label for="">Last Name</label>
                                <div class="p-2 border">                                   
                                    {{$users->lname}}
                                </div>
                                <label for="">Email</label>
                                <div class="p-2 border">                                   
                                    {{$users->email}}
                                </div>
                                <label for="">Phone</label>
                                <div class="p-2 border">                                   
                                    {{$users->phone}}
                                </div>
                                <label for="">Address</label>
                                <div class="p-2 border">                                   
                                    {{$users->address}}
                                </div>
                                <label for="">City</label>
                                <div class="p-2 border">                                   
                                    {{$users->city}}
                                </div>
                                <label for="">State</label>
                                <div class="p-2 border">                                   
                                    {{$users->state}}
                                </div>
                                <label for="">Country</label>
                                <div class="p-2 border">                                   
                                    {{$users->country}}
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
              
            </div>
          
        </div>
       
    </div>
@endsection