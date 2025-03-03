<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('admin.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.user.create');
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'role' => ['required']
        ]);
        try {
            $data = request()->only(['name', 'email', 'password', 'role']);
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.user.edit', compact('user'));
    }

    public function update($id)
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'password' => [Rule::when(request()->password, ['required', 'min:6'])],
            'role' => ['required']
        ]);
        try {
            $user  = User::findOrFail($id);
            $data = request()->only(['name', 'email', 'role']);
            if (request()->password)
                $data['password'] = bcrypt($data['password']);
            $user->update($data);
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
