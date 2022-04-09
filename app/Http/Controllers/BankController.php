<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankRequest;
use App\Models\Bank;
use Ramsey\Uuid\Uuid;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Bank::all();

        return view('pages.banks.index', [
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
        return view('pages.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
        $data = $request->all();

        $id = Uuid::uuid4()->toString();
        $data['image'] = '';

        Bank::create($data);
        return redirect()->route('banks.index')->with('success', 'Bank created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Bank::findOrFail($id);

        return view('pages.banks.detail', [
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
        $item = Bank::findOrFail($id);

        return view('pages.banks.edit', [
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
    public function update(BankRequest $request, $id)
    {
        $data = $request->all();

        $item = Bank::findOrFail($id);
        $data['image'] = '';
        $item->update($data);

        return redirect()->route('banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  Bank::findOrFail($id);
        $item->delete();

        return redirect()->route('banks.index');
    }
}
