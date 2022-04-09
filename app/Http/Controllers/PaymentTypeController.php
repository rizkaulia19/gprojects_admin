<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePageRequest;
use App\Http\Requests\DetailPageRequest;
use App\Http\Requests\PaymentType\PaymentTypeCreateRequest;
use App\Http\Requests\PaymentType\PaymentTypeUpdateRequest;
use App\Models\PaymentGateway;
use App\Models\PaymentType;
use App\Models\PaymentTypeCategory;
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

        return view('pages.payment-types.index', [
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
    public function store(PaymentTypeCreateRequest $request)
    {
        $data = $request->all();

        $id = Uuid::uuid4()->toString();

        PaymentType::create($data);
        return redirect()->route('payment-types.index')->with('success', 'Payment Type created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  DetailPageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPageRequest $request)
    {
        $item = PaymentType::findOrFail($request->id);

        return view('pages.payment-types.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  DetailPageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPageRequest $request)
    {
        $item = PaymentType::findOrFail($request->id);

        $payment_gateways = PaymentGateway::all();
        $payment_type_categories = PaymentTypeCategory::all();

        return view('pages.payment-types.edit', [
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
    public function update(PaymentTypeUpdateRequest $request)
    {
        $data = $request->all();

        $item = PaymentType::findOrFail($request->id);

        $item->update($data);

        return redirect()->route('payment-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeletePageRequest $request)
    {
        $item =  PaymentType::findOrFail($request->id);
        $item->delete();

        return redirect()->route('payment-types.index');
    }
}
