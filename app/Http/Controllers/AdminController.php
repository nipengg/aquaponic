<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'user';
        $user->save();

        return redirect()->route('admin.user');
    }

    public function unapprove($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);
        $user->update($data);
        $user->role = $data['role'];
        $user->save();

        return redirect()->route('admin.user');
    }
}
