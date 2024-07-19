<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\UserRole;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'dashboard.admin.user.index',
            [
                'users' => User::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = UserRole::getValues();
        return view('dashboard.admin.user.create', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'role' => ['required', 'in:superadmin,admin,approver'],
            'password' => 'required|min:5|max:255',
            'confirm_password' => 'required|same:password',
        ]);

        unset($validatedData['confirm_password']);

        User::create($validatedData);
        return redirect('/users')->with('success', 'Succesfully create new user!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = UserRole::getValues();
        return view('dashboard.admin.user.edit', [
            'roles' => $roles,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'role' => ['required', 'in:superadmin,admin,approver'],
        ];

        if($request->username != $user->username){
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }
        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        }


        $validatedData = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validatedData);
        return redirect('/users')->with('success', 'Succesfully update user!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/users')->with('success', 'Success delete user!');
    }
}
