<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Project;
use App\Models\TicketProject;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\TicketStatus;
use App\Models\ServiceOrder;
use App\Models\TypeService;
use App\Models\Warranty;
use App\Models\TypeMaintenance;
use App\Models\TicketPriority;
use App\Models\Status;
use App\Models\Factory;
use App\Models\TicketLocation;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

/**
 * Class TicketController
 * @package App\Http\Controllers
 */
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate();

        $serviceOrder = new ServiceOrder();

        $service = TypeService::pluck('name','type_service_id');

        $maintenance = TypeMaintenance::pluck('name','type_maintenance_id');

        $priority = TicketPriority::pluck('name','ticket_priority_id');

        $contacts = Contact::all();

        $customers = Customer::all();

        return view('ticket.index', compact('tickets','serviceOrder','service','maintenance','priority','contacts','customers'))
            ->with('i', (request()->input('page', 1) - 1) * $tickets->perPage());
    }

    public function pdf()
    {
        $tickets = Ticket::paginate();
        $contacts = Contact::all();
        $customers = Customer::all();
        //$data = array(['tickets' => $tickets],['contacts' => $contacts],['customers' => $customers]);
        //$pdf = PDF::loadView('ticket.pdf',['tickets' => $tickets],['contacts' => $contacts]);
        $pdf = PDF::loadView('ticket.pdf',compact('tickets','contacts','customers'));
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticket = new Ticket();
        $status = Status::pluck('name','status_id');
        $customers = Customer::pluck('name','customer_id');
        $customer2 = 0000000002;//Customer::pluck('customer_id');
        //$contact2 = "SELECT 'name' FROM contact WHERE customer_id = '$customer'";
        //$contact = Contact::where('customer_id', $customer2)->pluck('name','contact_id'); //
        $contacts = Contact::pluck('name','contact_id');
        $priority = TicketPriority::pluck('name','ticket_priority_id');
        
        $customer = new Customer();
        $contact = new Contact();
        $contacts2 = Contact::all();
        $customers2 = Customer::all();

        $countries = \DB::table('Customer.customer')
            ->get();
        
        $projects = Project::all();
        $warranty_of = Warranty::all();

        $factory = new Factory();

        return view('ticket.create', compact('ticket','status','customers2','contacts2','priority','customers','contacts','customer','contact',
        'countries','projects','warranty_of', 'factory'));
        //return view('ticket.create', compact('ticket','status','priority','customers','contacts'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ticket::$rules);
        $statement = DB::statement("SET @user_id = 9999");

        $tickets = request()->except('_token','contact','customer_id','priority_id','project_id_s','project_id','factory_id','site','location');

        $ticket_project = request()->except('_token','contact','customer_id','priority_id','subject','problem','contact_id','project_id_s','factory_id','site','location');

        $ticket_location = request()->except('_token','contact','customer_id','priority_id','subject','problem','contact_id','project_id_s','project_id');

        $fechaActual = date('y/m/d');

        $tickets ['ticket_priority_id'] = $request['priority_id'];

        $tickets ['date_ticket'] = $fechaActual;

        $tickets ['ticket_status_id'] = 1;

        $tickets ['ticket_origin_id'] = 2;

        $tickets ['user_id'] = 9999;

        $ticket_project ['user_id'] = 9999;

        $ticket_location ['user_id'] = 9999;

        if($ticket_location ['site'] == null){
            $ticket_location ['site'] = "-";
        }

        // return response()->json($ticket_location);

        Ticket::insert($tickets);


        $last_ticket = Ticket::latest('ticket_id')->first();

        $last_ticket = $last_ticket['ticket_id'];

        $ticket_project ['ticket_id'] = $last_ticket;

        $ticket_location ['ticket_id'] = $last_ticket;

        $project_id = explode(',',$ticket_project['project_id']);

        $ticket_project['project_id'] = $project_id[0];

        // return response()->json($ticket_project);

        TicketProject::insert($ticket_project);

        TicketLocation::insert($ticket_location);

        $data = Ticket::latest('ticket_id')->first();

            //return response()->json($data['ticket_id']);
        //$ticket = Ticket::create($request->all());
        $url = route('notify-ticket','id_ticket='.$data['ticket_id']);
        
        return redirect($url);
        /*return redirect()->route('tickets.index')
            ->with('success', 'Ticket '.$data['ticket_id'].' '.__('created successfully'));*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);

        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $status = TicketStatus::pluck('name','status_ticket_id');
        $customer = Customer::pluck('name','customer_id');
        //$contact2 = "SELECT 'name' FROM contact WHERE customer_id = '$customer'";
        $contact = Contact::pluck('name','contact_id');
        
        $contacts = new Contact();
        $status = Status::pluck('name','status_id');

        return view('ticket.edit', compact('ticket','status','customer','contact','contacts','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        request()->validate(Ticket::$rules);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket'.' '.__('updated successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id)->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket'.' '.__('deleted successfully'));
    }
}
