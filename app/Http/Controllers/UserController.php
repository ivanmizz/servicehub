<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showClients() {
        $clients = User::where('usertype', 0)->paginate(10); 
        return view('admin.clients', compact('clients'));
    }
}
