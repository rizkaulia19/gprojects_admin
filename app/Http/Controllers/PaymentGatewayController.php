<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentGateway;
use App\Http\Requests\PaymentGatewayRequest;
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

        return view('pages.payment-gateways.index',[
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentGatewayRequest $request)
    {
        $data = $request->all();

        $id = Uuid::uuid1()->toString();

        PaymentGateway::create($data);
        return redirect()->route('payment-gateways.index');
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

        return view('pages.payment-gateways.detail',[
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

        return view('pages.payment-gateways.edit',[
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
    public function update(PaymentGatewayRequest $request, $id)
    {
        $data = $request->all();

        $item = PaymentGateway::findOrFail($id);
        
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
