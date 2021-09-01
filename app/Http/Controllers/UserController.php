<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

        return view('pages.users.index',[
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
        $item = User::findOrFail($id);

        return view('pages.users.detail',[
            'item' => $item
        ]);
    }

}
