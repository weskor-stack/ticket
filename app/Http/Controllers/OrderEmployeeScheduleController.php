<?php

namespace App\Http\Controllers;

use App\Models\OrderEmployeeSchedule;
use Illuminate\Http\Request;

/**
 * Class OrderEmployeeScheduleController
 * @package App\Http\Controllers
 */
class OrderEmployeeScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderEmployeeSchedules = OrderEmployeeSchedule::paginate();

        return view('order-employee-schedule.index', compact('orderEmployeeSchedules'))
            ->with('i', (request()->input('page', 1) - 1) * $orderEmployeeSchedules->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderEmployeeSchedule = new OrderEmployeeSchedule();
        return view('order-employee-schedule.create', compact('orderEmployeeSchedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(OrderEmployeeSchedule::$rules);

        $dataOrderEmployees = request()->except('_token');

        $dataOrderEmployees['user_id']=9999;

        $completion = (float) preg_replace('/^(\d+):(\d+).+/','\1.\2',$dataOrderEmployees['time_departure']);

        $entry = (float) preg_replace('/^(\d+):(\d+).+/','\1.\2',$dataOrderEmployees['time_entry']);

        $completion = number_format($completion, 2);

        $entry = number_format($entry, 2);

        $dataOrderEmployees['hours_service'] = number_format($completion - $entry, 2);

        //return response()->json($dataOrderEmployees);

        OrderEmployeeSchedule::insert($dataOrderEmployees);

        // $orderEmployeeSchedule = OrderEmployeeSchedule::create($request->all());

        // return redirect()->route('service-orders.index','id_ticket='. $dataOrderEmployees['order_service_id'])
        //     ->with('success', 'OrderEmployeeSchedule created successfully.');
        return redirect()->back()
        ->with('success', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderEmployeeSchedule = OrderEmployeeSchedule::find($id);

        return view('order-employee-schedule.show', compact('orderEmployeeSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderEmployeeSchedule = OrderEmployeeSchedule::find($id);

        return view('order-employee-schedule.edit', compact('orderEmployeeSchedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OrderEmployeeSchedule $orderEmployeeSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderEmployeeSchedule $orderEmployeeSchedule)
    {
        request()->validate(OrderEmployeeSchedule::$rules);

        $orderEmployeeSchedule->update($request->all());

        return redirect()->route('order-employee-schedules.index')
            ->with('success', 'OrderEmployeeSchedule updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // return response()->json($id);
        $orderEmployeeSchedule = OrderEmployeeSchedule::find($id)->delete();

        // return redirect()->route('order-employee-schedules.index')
        //     ->with('success', 'OrderEmployeeSchedule deleted successfully');

        return redirect()->back()
        ->with('success', __('Deleted successfully'));
    }
}
