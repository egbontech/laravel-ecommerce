<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\user;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function users()
    {
        $users = user::all();
        return view('admin.users.index',compact('users'));
    }
    public function user($id)
    {
      $users = user::where('id',$id)->first();
      return view('admin.users.view',compact('users'));
    }
}
