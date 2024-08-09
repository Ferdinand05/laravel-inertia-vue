<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('User/Index', [
            'users' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('User/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
            'avatar' => ['image', 'nullable', 'mimes:png,jpg,jpeg']
        ]);


        $file = $request->file('avatar');
        if ($file) {
            $name = Str::random(10);
            $ext = $file->getClientOriginalExtension();

            $avatar = $name . '.' . $ext;
            $file->storeAs('avatar', $avatar);
        } else {
            $avatar = null;
        }


        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => $avatar
        ]);



        return redirect(route('user.index'))->with('message', 'data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('User/Show', ['user' => User::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('User/Edit', ['user' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id)],
            'avatar' => ['image', 'mimes:png,jpg,jpeg', 'nullable']
        ]);


        $file = $request->file('avatar');
        $user = User::whereId($id)->first();
        if ($file) {
            $name = Str::random(10);
            $ext = $file->getClientOriginalExtension();
            $avatar = $name . '.' . $ext;

            $file->storeAs('avatar', $avatar);
        } else {
            $avatar = $user->avatar;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatar
        ]);

        return to_route('user.index')->with('message', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        Storage::delete('avatar/' . $user->avatar);
        $user->delete();
        return to_route('user.index')->with('message', 'data has been deleted');
    }
}
