<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentGatewayRequest;
use App\Http\Requests\PaymentGatewayUpdateRequest;
use App\Models\PaymentGateway;
use Ramsey\Uuid\Uuid;

class PaymentGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = PaymentGateway::all();

        return view('pages.payment-gateways.index', [
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
        return view('pages.payment-gateways.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PaymentGatewayRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentGatewayRequest $request)
    {
        $data = $request->all();

        $id = Uuid::uuid4()->toString();

        PaymentGateway::create($data);
        return redirect()->route('payment-gateways.index')->with('success', 'Payment Gateway created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = PaymentGateway::findOrFail($id);

        return view('pages.payment-gateways.detail', [
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
        $item = PaymentGateway::findOrFail($id);

        return view('pages.payment-gateways.edit', [
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
    public function update(PaymentGatewayUpdateRequest $request)
    {
        $data = $request->all();

        $item = PaymentGateway::findOrFail($request->id);

        $item->update($data);

        return redirect()->route('payment-gateways.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  PaymentGateway::findOrFail($id);
        $item->delete();

        return redirect()->route('payment-gateways.index');
    }
}
