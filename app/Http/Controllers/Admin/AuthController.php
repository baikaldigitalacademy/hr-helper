<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthRequest;
use App\Models\User;

class AuthController extends Controller
{

    public function index()
    {
        return view(
            'admin.auth.index',
            [
                'users' => User::where('is_admin', false)->get(),
                'attributes' => ['id', 'name', 'email'],
            ]
        );
    }

    public function create()
    {
        return view(
            'admin.auth.create',
            [
                'attributes' => ['name', 'email', 'password']
            ]
        );
    }

    public function store(AuthRequest $request)
    {
        User::create($request->except('_token'));
        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.auth.edit',
            [
                'attributes' => ['name', 'email'],
                'user' => $user,
            ]
        );
    }

    public function update(AuthRequest $request, User $user)
    {
        $user->update($request->except('_token'));
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
