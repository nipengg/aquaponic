<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        return view('admin.user', ['user' => $id]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('admin.user');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.user');
    }
}
