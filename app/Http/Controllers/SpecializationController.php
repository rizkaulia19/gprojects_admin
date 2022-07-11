<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePageRequest;
use App\Http\Requests\DetailPageRequest;
use App\Http\Requests\Specialization\SpecializationCreateRequest;
use App\Http\Requests\Specialization\SpecializationUpdateRequest;
use App\Models\Specialization;
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
        $items = Specialization::with(['project_specializations','click_specializations'])->get();

        return view('pages.specializations.index', [
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
     * @param  SpecializationCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecializationCreateRequest $request)
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
     * @param  DetailPageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPageRequest $request)
    {
        $item = Specialization::findOrFail($request->id);
        return view('pages.specializations.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  DetailPageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPageRequest $request)
    {
        $item = Specialization::findOrFail($request->id);
        return view('pages.specializations.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SpecializationUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(SpecializationUpdateRequest $request)
    {
        $data = $request->all();

        $item = Specialization::findOrFail($request->id);
        $item->update($data);

        return redirect()->route('specializations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeletePageRequest $request)
    {
        $item =  Specialization::findOrFail($request->id);
        $item->delete();

        return redirect()->route('specializations.index');
    }
}
