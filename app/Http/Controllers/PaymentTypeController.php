<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentType;
use App\PaymentGateway;
use App\PaymentTypeCategory;
use App\Http\Requests\PaymentTypeRequest;
use Ramsey\Uuid\Uuid;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = PaymentType::all();

        return view('pages.payment-types.index',[
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
        $payment_gateways = PaymentGateway::all();
        $payment_type_categories = PaymentTypeCategory::all();

        return view('pages.payment-types.create')->with([
            'payment_gateways' => $payment_gateways,
            'payment_type_categories' => $payment_type_categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentTypeRequest $request)
    {
        $data = $request->all();

        $id = Uuid::uuid4()->toString();

        PaymentType::create($data);
        return redirect()->route('payment-types.index')->with('success', 'Payment Type created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = PaymentType::findOrFail($id);

        return view('pages.payment-types.detail',[
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
        $item = PaymentType::findOrFail($id);

        $payment_gateways = PaymentGateway::all();
        $payment_type_categories = PaymentTypeCategory::all();

        return view('pages.payment-types.edit',[
            'item' => $item,
            'payment_gateways' => $payment_gateways,
            'payment_type_categories' => $payment_type_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentTypeRequest $request, $id)
    {
        $data = $request->all();

        $item = PaymentType::findOrFail($id);
        
        $item->update($data);

        return redirect()->route('payment-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  PaymentType::findOrFail($id);
        $item->delete();

        return redirect()->route('payment-types.index');
    }
}
