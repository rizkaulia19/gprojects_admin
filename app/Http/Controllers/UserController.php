<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::all();

        return view('pages.users.index', [
            'items' => $items
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = User::with(['user_specializations'])
            ->findOrFail($id);

        return view('pages.users.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('pages.users.create')->with([
            'roles' => $roles,
            // ('success', 'Data baru berhasil ditambah!')
        ]);

        return back()->with('success', 'Data baru berhasil ditambah!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $id = Uuid::uuid4()->toString();
        $data['islandId'] = '5d71c2b9-c9bd-4242-9dd9-195f08fe088f';

        // $data['password'] = Hash::make($data['password']);

        //Validate
        $request->validate([
            'code' => 'required|unique:users',
            'roleId' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'nik' => 'required|min:16|unique:users|numeric',
            'username' => 'required|min:4|unique:users',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:11|numeric|unique:users'
        ]);

        User::create($data);
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.users.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = User::findOrFail($id);
        $item->update($data);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  User::findOrFail($id);
        $item->delete();

        return redirect()->route('users.index');
    }
}
