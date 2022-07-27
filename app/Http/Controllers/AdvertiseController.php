<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertiseRequest;
use App\Models\Advertise;
use App\Models\AdvertiseType;
use App\Models\Currency;
use Ramsey\Uuid\Uuid;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Advertise::all();

        return view('pages.advertises.index', [
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
        $advertise_types = AdvertiseType::all();
        $currencies = Currency::all();

        return view('pages.advertises.create')->with([
            'advertise_types' => $advertise_types,
            'currencies' => $currencies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertiseRequest $request)
    {
        $data = $request->all();

        $id = Uuid::uuid4()->toString();

        Advertise::create($data);
        return redirect()->route('advertises.index')->with('success', 'Advertise created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Advertise::findOrFail($id);

        return view('pages.advertises.detail', [
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
        $item = Advertise::findOrFail($id);

        $advertise_types = AdvertiseType::all();
        $currencies = Currency::all();

        return view('pages.advertises.edit', [
            'item' => $item,
            'advertise_types' => $advertise_types,
            'currencies' => $currencies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertiseRequest $request, $id)
    {
        $data = $request->all();

        $item = Advertise::findOrFail($id);

        $item->update($data);

        return redirect()->route('advertises.index')->with('updated', 'Advertise updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  Advertise::findOrFail($id);
        $item->delete();

        return redirect()->route('advertises.index');
    }
}
