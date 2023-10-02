<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showClients() {
        $clients = User::where('usertype', 0)->paginate(10);  // Fetch 10 clients per page. Adjust as needed.
        return view('admin.clients', compact('clients'));
    }
}
