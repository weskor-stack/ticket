<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer,Contact;

class DropdownController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $countries = \DB::table('Customer.customer')
            ->get();
        
        return view('dropdown', compact('countries'));
    }

    /**
     * return states list.
     *
     * @return json
     */
    public function getStates(Request $request)
    {
        $states = \DB::table('Customer.contact')
            ->where('customer_id', $request->customer_id)
            ->get();
        
        if (count($states) > 0) {
            return response()->json($states);
        }
    }

    /**
     * return states list.
     *
     * @return json
     */
    public function getStockes(Request $request)
    {
        $stocks = \DB::table('material')
            ->where('material_id', $request->material_id)
            ->get();
        
        if (count($stocks) > 0) {
            return response()->json($stocks);
        }
    }

    /**
     * return states list.
     *
     * @return json
     */
    public function getFactories(Request $request)
    {
        $factories = \DB::table('Customer.factory')
            ->where('customer_id', $request->customer_id)
            ->get();
        
        if (count($factories) > 0) {
            return response()->json($factories);
        }
    }

    /**
     * return states list.
     *
     * @return json
     */
    public function getAddress(Request $request)
    {
        $factories = \DB::table('Customer.factory')
            ->where('factory_id', $request->factory_id)
            ->get();
        
        if (count($factories) > 0) {
            return response()->json($factories);
        }
    }

}
