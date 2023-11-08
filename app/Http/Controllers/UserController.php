<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(User::paginate(5));
        return Inertia::render('Users/Index', [
            "title" => "Users",
            'users' => User::orderByDesc('created_at')->paginate(5),
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Users/Create', [
            "title" => "Create User",
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create(
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', ValidationRule::unique('users')],
                'password' => ['required'],
            ])
        );

        return redirect()->route('users.index');
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
        return Inertia::render('Users/Edit', [
            "title" => "Edit User",
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update(
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', ValidationRule::unique('users')->ignore($user->id)],
            ])
        );

        session()->flash('message', 'User has edited');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
