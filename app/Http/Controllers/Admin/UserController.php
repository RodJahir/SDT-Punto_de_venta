<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.user.index')->only('index');
        $this->middleware('can:admin.user.create')->only('create','store');
        $this->middleware('can:admin.user.edit')->only('edit', 'update');
        $this->middleware('can:admin.user.delete')->only('delete');
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
        $newUser->email = $request->email;
        $newUser->save();
        return redirect('admin/user');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('admin/user/edit',compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.user.edit', $user)->with('info', 'Se asignan los roles corectamente');
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin/user')->with('delete', 'ok');
    }
}
