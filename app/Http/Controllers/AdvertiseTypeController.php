<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdvertiseType;
use App\Advertise;
use App\Http\Requests\AdvertiseTypeRequest;
use Ramsey\Uuid\Uuid;

class AdvertiseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = AdvertiseType::all();

        return view('pages.advertise-types.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.advertise-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertiseTypeRequest $request)
    {
        $data = $request->all();

        $id = Uuid::uuid4()->toString();

        AdvertiseType::create($data);
        return redirect()->route('advertise-types.index')->with('success', 'Advertise Type created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = AdvertiseType::with(['advertises'])->findOrFail($id);

        return view('pages.advertise-types.detail',[
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = AdvertiseType::findOrFail($id);

        return view('pages.advertise-types.edit',[
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
    public function update(AdvertiseTypeRequest $request, $id)
    {
        $data = $request->all();

        $item = AdvertiseType::findOrFail($id);
        
        $item->update($data);

        return redirect()->route('advertise-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  AdvertiseType::findOrFail($id);
        $item->delete();

        return redirect()->route('advertise-types.index');
    }
}
