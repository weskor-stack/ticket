<?php

namespace App\Http\Controllers;

use App\Models\OrderPurchase;
use Illuminate\Http\Request;

use DB;

/**
 * Class OrderPurchaseController
 * @package App\Http\Controllers
 */
class OrderPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderPurchases = OrderPurchase::paginate();

        return view('order-purchase.index', compact('orderPurchases'))
            ->with('i', (request()->input('page', 1) - 1) * $orderPurchases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderPurchase = new OrderPurchase();
        return view('order-purchase.create', compact('orderPurchase'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statement = DB::statement("SET @user_id = 9999");
        request()->validate(OrderPurchase::$rules);

        $orderPurchases = request()->except('_token');

        $orderPurchases ['order_service_id'] = $request['order_service_id'];

        $orderPurchases ['purchase_id'] = 0;

        $orderPurchases ['user_id'] = 9999;

        // return response()->json($orderPurchases);

        OrderPurchase::insert($orderPurchases);

        // $orderPurchase = OrderPurchase::create($request->all());

        // return redirect()->route('order-purchases.index')
        return redirect()->back()
            ->with('success', __('OrderPurchase created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderPurchase = OrderPurchase::find($id);

        return view('order-purchase.show', compact('orderPurchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderPurchase = OrderPurchase::find($id);

        return view('order-purchase.edit', compact('orderPurchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OrderPurchase $orderPurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderPurchase $orderPurchase)
    {
        request()->validate(OrderPurchase::$rules);

        $orderPurchase->update($request->all());

        return redirect()->route('order-purchases.index')
            ->with('success', 'OrderPurchase updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $orderPurchase = OrderPurchase::find($id)->delete();

        return redirect()->route('order-purchases.index')
            ->with('success', 'OrderPurchase deleted successfully');
    }
}
