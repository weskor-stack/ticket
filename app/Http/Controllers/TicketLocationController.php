<?php

namespace App\Http\Controllers;

use App\Models\TicketLocation;
use Illuminate\Http\Request;

/**
 * Class TicketLocationController
 * @package App\Http\Controllers
 */
class TicketLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketLocations = TicketLocation::paginate();

        return view('ticket-location.index', compact('ticketLocations'))
            ->with('i', (request()->input('page', 1) - 1) * $ticketLocations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticketLocation = new TicketLocation();
        return view('ticket-location.create', compact('ticketLocation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TicketLocation::$rules);
        $statement = DB::statement("SET @user_id = 9999");

        $ticketLocation = TicketLocation::create($request->all());

        return redirect()->route('ticket-locations.index')
            ->with('success', 'TicketLocation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticketLocation = TicketLocation::find($id);

        return view('ticket-location.show', compact('ticketLocation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticketLocation = TicketLocation::find($id);

        return view('ticket-location.edit', compact('ticketLocation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TicketLocation $ticketLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketLocation $ticketLocation)
    {
        // $request['ticket_id'] = $ticketLocation['ticket_id'];
        request()->validate(TicketLocation::$rules);

        // $request['user_id'] = $ticketLocation['user_id'];

        // $request['date_registration'] = $ticketLocation['date_registration'];

        // return response()->json($request);

        $ticketLocation->update($request->all());

        // return redirect()->route('ticket-locations.index')
        //     ->with('success', 'TicketLocation updated successfully');
        return redirect()->back()
        ->with('success', __('Updated successfully.'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ticketLocation = TicketLocation::find($id)->delete();

        return redirect()->route('ticket-locations.index')
            ->with('success', 'TicketLocation deleted successfully');
    }
}
