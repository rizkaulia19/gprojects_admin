<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialization;
use App\ProjectSpecialization;
use App\Http\Requests\SpecializationRequest;
use Ramsey\Uuid\Uuid;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Specialization::with(['project_specializations'])->get();

        return view('pages.specializations.index',[
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
        return view('pages.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecializationRequest $request)
    {
        $data = $request->all();

        $id = Uuid::uuid4()->toString();
        $data['islandId'] = '5d71c2b9-c9bd-4242-9dd9-195f08fe088f';

        Specialization::create($data);
        return redirect()->route('specializations.index')->with('success', 'Specialization created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Specialization::findOrFail($id);

        return view('pages.specializations.detail',[
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
        $item = Specialization::findOrFail($id);

        return view('pages.specializations.edit',[
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
    public function update(SpecializationRequest $request, $id)
    {
        $data = $request->all();

        $item = Specialization::findOrFail($id);
        $item->update($data);

        return redirect()->route('specializations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  Specialization::findOrFail($id);
        $item->delete();

        return redirect()->route('specializations.index');
    }
}
