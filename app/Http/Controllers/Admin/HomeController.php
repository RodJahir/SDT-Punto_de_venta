<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin/user/index', compact('users'));
    }

    public function create()
    {
        return view('admin/user/create');
    }

    public function store(Request $request)
    {
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        //$newUser->save();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin/user/edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        //$user -> fill($request->name);
        //$user->name = $request->name;
        $user->save();
        return redirect('admin/user');
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin/user')->with('delete', 'ok');
    }
}
