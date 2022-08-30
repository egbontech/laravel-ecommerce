@extends('layouts.admin')

@section('title','Users')


@section('content')

    <div class="card">
        <div class="card-header">
           
            <h2>Registered Users
            
            </h2>
           
        </div>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>ID</th>                     
                        <th>Name</th>                       
                        <th>email</th>
                        <th>Phone</th>                      
                        <th>Action</th>
                       
                    </tr>                    
                </thead>    
                <tbody>
                    @foreach ($users as $user)                      
                
                    <tr>
                        <td>{{$user->id}}</td>                        
                        <td>{{$user->name. '  ' . $user->lname}}</td>                        
                        <td>{{$user->email}}</td>                        
                        <td>{{$user->phone}}</td>                        
                                          
                        <td>
                            <a href="{{url('admin/view-user/'.$user->id)}}" class="btn btn-secondary">View</a>                           
                        </td>                        
                                            
                                               
                    </tr>     
                    @endforeach             
                </tbody>            
            </table>         
        </div>
    </div>
@endsection