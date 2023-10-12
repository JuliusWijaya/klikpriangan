<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'User';
        $datas = User::where('id', '!=', 6)->where('status', 'active')->latest()->get();

        return view('users.index', [
            'title' => $title,
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Role::select('id', 'name')->get();

        return view('users.create', [
            'title' => 'Create New User',
            'datas' => $datas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'      => 'required|min:6|max:30',
            'username'  => 'required|min:6|unique:users',
            'email'     => 'required',
            'password'  => 'required|min:6|max:20',
            'role_id'   => 'required',
        ]);

        $validate['username'] = Str::lower($validate['username']);
        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);
        Alert::success('Success', 'Successfully add user');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data = User::withCount('post')->where('username', $user->username)->first();

        return view('users.details', [
            'title'   => 'Details ' . $user->username,
            'data'    => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $datas = Role::all();

        return view('users.edit', [
            'title'     => $user->username,
            'data'      => $user,
            'datas'     => $datas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required|email:dns',
            'status'    => 'required',
            'role_id'   => 'required'
        ]);

        $validateData['username'] = Str::lower($validateData['username']);
        User::where('id', $user->id)
            ->update($validateData);
        Alert::success('Success', 'Successfully edit user');
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        Alert::success('Success', 'Successfully deleted user');
        return redirect('/users');
    }

    public function status()
    {
        $status = User::where('status', 'inactive')->get();

        return view('users.status', [
            'title'     => 'User inactive',
            'status'    => $status,
        ]);
    }

    public function statusActive(User $user)
    {
        $data = User::find($user->id);
        $data->status = 'active';
        $data->save();
        Alert::success('Success', 'Status user successfully active');
        return redirect('/users');
    }
}
