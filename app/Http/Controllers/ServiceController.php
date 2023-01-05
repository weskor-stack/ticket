<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceReport;
use App\Models\ReportStatus;
use App\Models\ServiceOrder;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Priority;
use App\Models\Employee;
use App\Models\EmployeeOrder;
use App\Models\MaterialAssigned;
use App\Models\MaterialUsed;
use App\Models\Material;
use App\Models\ToolAssigned;
use App\Models\TypeMaintenance;
use App\Models\TypeService;
use App\Models\ToolUsed;
use App\Models\Tool;
use App\Models\Ticket;
use App\Models\ServiceEmployee;
use App\Models\{TicketLocation, Factory};

use App\Models\ServiceTaskSpecific;
use DB;
use Illuminate\Http\Request;
use PDF;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 */
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $_GET['id_ticket'];
        $services = Service::paginate();

        /*$service = Service::select('service_id', 'date_service', 'status_report_id', 'order_service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $datas)->get();*/


        $service2 = Service::select('service_id')
        ->where('order_service_id', '=', $datas)->get();

        // $service2 = preg_replace('/[^0-9]/', '', $service2);
        
        $service2 = $service2[0]['service_id'];

        // return response()->json($service2);

        $serviceOrder = ServiceOrder::select('order_service_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'order_status_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $datas)->get();

        $serviceOrder_id = $serviceOrder[0]['order_status_id'];

        // return response()->json($serviceOrder_id);
        //$serviceOrder = explode('"',$serviceOrder);
        //$serviceOrder = preg_replace('/[^0-9]/', '', $serviceOrder);

        $materialAssigneds = MaterialAssigned::select('material_id', 'quantity', 'order_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder[0]['order_service_id'])->get();

        // return response()->json($materialAssigneds);

        $toolAssigneds = ToolAssigned::select('tool_id', 'quantity', 'order_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=',  $serviceOrder[0]['order_service_id'])->get();

        $service3 = Service::select('service_id','order_service_id')
        ->where('order_service_id', '=', $serviceOrder[0]['order_service_id'])->get();

        //$service3 = preg_replace('/[^0-9]/', '', $service3);*/

        $service4 = $service3[0]['order_service_id'];

        $service5 = $service3[0]['service_id'];

        $service_employees = ServiceEmployee::select('service_employee_id', 'service_id', 'employee_id', 'status_id', 
        'user_id', 'date_registration')
        ->where('service_id', '=', $service5)->get();

        // return response()->json($service_employees);
        // $sql = "SELECT 'service_employee_id', 'service_id', 'employee_id', 'status_id', 'user_id', 'date_registration' 
        // FROM 'service_employee' WHERE service_id = $service3";

        $serviceReports = ServiceReport::all();/*select('service_employee_id','time_entry', 'time_departure', 'lunchtime', 'hours_service', 'hours_extras', 'hours_travel', 'date')
        ->where('service_employee_id', '=', $service_employees[0]['service_employee_id'])->get();*/

        //return response()->json($service_employees);

        $service = Service::find($service5);
        //return response()->json($service);
        /*$serviceOrder = ServiceOrder::select('order_service_id', 'date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $datas)->get();*/
        //$serviceOrder = ServiceOrder::pluck('order_service_id','order_service_id');

        $materialUseds = MaterialUsed::select('service_material_id','material_id', 'quantity', 'service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service5)->get();

        $toolUseds = ToolUsed::select('service_tool_id','tool_id', 'quantity', 'service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service5)->get();

        $materialUsed = new MaterialUsed();

        $toolUsed =new ToolUsed();

        $serviceReport = new ServiceReport();

        $employee = Employee::pluck('name','employee_id');

        $serviceTaskSpecific = new ServiceTaskSpecific();
        
        $activity2 = ServiceTaskSpecific::select('service_id','description','previous_evidence',
        'subsequent_evidence','signature_evidence','contact_id','employee_id','user_id','date_registration')
        ->where('service_id', '=', $service5)->get();

        //return response()->json($activity2);
        $employeeOrders2 = EmployeeOrder::all();

        /*$activities = explode('"',$activity2);
        // $activities = preg_replace('/[^0-9]/', '', $activities);
        
        // $activity = ServiceTaskSpecific::find($activity2);

        // $serviceOrder2 = ServiceOrder::select('ticket_id')
        // ->where('order_service_id', '=', $activities[2])->get();

        // $serviceOrder2 = explode('"',$serviceOrder2);
        // $serviceOrder2 = preg_replace('/[^0-9]/', '', $serviceOrder2);

        $serviceOrder2 = $serviceOrder2[2];*/
        
        $materials2 = MaterialAssigned::select('material_id', 'quantity', 'order_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder[0]['order_service_id'])->get();

        $material = MaterialAssigned::find($serviceOrder[0]['order_service_id']);

        $material2 = MaterialAssigned::whereNotIn('material_id', MaterialUsed::select('material_id'))
        ->where('order_service_id', '=', $serviceOrder[0]['order_service_id'])->get();

        $tool2 = ToolAssigned::select('*')->whereNotIn('tool_id', ToolUsed::select('tool_id'))
        ->where('order_service_id', '=', $serviceOrder[0]['order_service_id'])->get();

        /*$tool2 = ToolAssigned::whereNotIn('tool_id', ToolUsed::select('tool_id')
        ->where('order_service_id', '=', $serviceOrder[2])) ->get();*/

        $tools2 = ToolAssigned::select('tool_id', 'quantity', 'order_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder[0]['order_service_id'])->get();
        
        //return response()->json($tool2);

        $service_report = ServiceReport::all();/*select('service_employee_id', 'time_entry', 'time_departure', 'lunchtime', 'hours_service', 'hours_extras', 'hours_travel', 'date', 'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();*/

        $tickets_contact = Ticket::select('contact_id','ticket_id')
        ->where('ticket_id', '=', $serviceOrder[0]['ticket_id'])->get();

        $tickets = $tickets_contact[0]['ticket_id'];

        // return response()->json($tickets_contact);

        //$tickets_contact = preg_replace('/[^0-9]/', '', $tickets_contact);

        $contacts = Contact::select('customer_id','name','last_name','phone','contact_id','job_title')
        ->where('contact_id', '=', $tickets_contact[0]['contact_id'])->get();

        $customers = Customer::select('name','customer_id','address','phone')
        ->where('customer_id', '=', $contacts[0]['customer_id'])->get();

        $service_employees = ServiceEmployee::all();

        $employees = Employee::all();

        $employee_order = EmployeeOrder::select('order_service_id','employee_id','status_id')
        ->where('order_service_id', '=', $serviceOrder[0]['order_service_id'])->get();

        $employeeOrders = EmployeeOrder::select('order_service_id','employee_id','status_id')
        ->where('order_service_id', '=', $serviceOrder[0]['order_service_id'])->get();

        $service_order = ServiceOrder::all();

        //$serviceOrder = ServiceOrder::find();
        //return response()->json($tickets_contact[0]['contact_id']);

        $serviceOrder_factory = ServiceOrder::select('order_service_id', 'date_order', 'ticket_id', 'order_status_id', 'type_maintenance_id', 'type_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $datas)->get();

        $ticket_location = TicketLocation::find($serviceOrder_factory[0]['ticket_id']);/*select('ticket_id','factory_id','site','location')
        ->where('ticket_id', '=', $serviceOrder_factory[0]['ticket_id'])->get();*/
        

        $factories = Factory::find($ticket_location['factory_id']);/*select( 'factory_id', 'key', 'name', 'address', 'customer_id', 'contact_id', 'user_id', 'date_registration')
        ->where('factory_id', '=', $ticket_location[0]['factory_id'])->get();*/

        return view('service.index', compact('services','service','serviceOrder','serviceReport','employee','service2','serviceOrder','materialAssigneds','toolAssigneds',
        'serviceReports','serviceTaskSpecific', 'activity2','employeeOrders', 'materialUseds', 'materialUsed','materials2','tools2','toolUsed','toolUseds','tool2','material2',
        'service_report','customers','contacts','tickets_contact','tickets','service_employees','employees','employee_order','service5',
        'serviceOrder_id','serviceOrder_factory','ticket_location','factories'))
            ->with('i', (request()->input('page', 1) - 1) * $services->perPage());
    }

    public function pdf()
    {
        $datas = $_GET['id_ticket'];

        $services = Service::paginate();

        $service2 = Service::select('order_service_id')
        ->where('order_service_id', '=', $datas)->get();

        $service2 = $service2[0]['order_service_id'];

        $serviceOrder = ServiceOrder::select('order_service_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'order_status_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $service2)->get();

        $type_maintenance = $serviceOrder[0]['type_maintenance_id'];

        $type_service = $serviceOrder[0]['type_service_id'];

        $serviceOrder_id = $serviceOrder[0]['order_service_id'];

        $materialAssigneds = MaterialAssigned::select('material_id', 'quantity', 'order_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder_id)->get();

        $toolAssigneds = ToolAssigned::select('tool_id', 'quantity', 'order_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder_id)->get();

        $service3 = Service::select('service_id')
        ->where('order_service_id', '=', $serviceOrder_id)->get();

        $service3 = $service3[0]['service_id'];

        //$service3 = preg_replace('/[^0-9]/', '', $service3);
        $serviceEmployee = ServiceEmployee::select('service_employee_id','service_id','employee_id','status_id')
        ->where('service_id','=',$service3)->get();

        $serviceReports = ServiceReport::all();//select('service_employee_id','time_entry','time_departure','lunchtime','hours_service','hours_extras','hours_travel','date','user_id','date_registration')
        // ->where('service_employee_id', '=', $service3)->get();

        $service = Service::find($service3);
        
        $service_employees = ServiceEmployee::select('service_employee_id', 'service_id', 'employee_id', 'status_id', 
        'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $employees = Employee::all();

        // return response()->json($service_employees);

        $materialUseds = MaterialUsed::select('material_id', 'quantity', 'service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $toolUseds = ToolUsed::select('tool_id', 'quantity', 'service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $activity2 = ServiceTaskSpecific::select('service_id', 'description', 'previous_evidence', 'subsequent_evidence', 'signature_evidence', 'employee_id', 
        'contact_id','user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $serviceTaskSpecific = new ServiceTaskSpecific();

        $tickets_contact = Ticket::select('contact_id','ticket_id')
        ->where('ticket_id', '=', $serviceOrder[0]['ticket_id'])->get();

        $tickets = $tickets_contact[0]['ticket_id'];

        $contacts = Contact::select('customer_id','name','last_name','phone','contact_id')
        ->where('contact_id', '=', $tickets_contact[0]['contact_id'])->get();

        $customers = Customer::select('name','customer_id','address','phone')
        ->where('customer_id', '=', $contacts[0]['customer_id'])->get();

        $serviceOrder2 = ServiceOrder::select('order_service_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'order_status_id', 'user_id', 'date_registration')
        ->where('ticket_id', '=', $tickets)->get();

        $maintenances = TypeMaintenance::all();

        $typeServices = TypeService::all();

        $employees = Employee::all();

        //return response()->json($maintenances);
        
        $pdf = PDF::loadView('service.pdf',['services' => $services], compact('services','service','serviceReports','materialUseds',
        'toolUseds','serviceTaskSpecific','contacts','customers','tickets','serviceOrder2','maintenances','typeServices','employees',
        'activity2','service_employees','service3','type_maintenance','type_service'));
        return $pdf->stream();
        //return $pdf->download('order.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new Service();
        $serviceorder = ServiceOrder::pluck('order_service_id','order_service_id');
        $serviceReport = ServiceReport::pluck('service_id','service_id');
        $status = ReportStatus::pluck('name','status_report_id');
        $customer = Customer::pluck('name','customer_id');
        $priority = Priority::pluck('name','priority_id');
        $employee = Employee::pluck('name','employee_id');

        return view('service.create', compact('service','status','serviceorder','customer','priority','serviceReport','employee'));
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
        request()->validate(Service::$rules);
        $dataService = request()->except('_token');

        /*$url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id']);
        $dataService['order_service_id']=$results['id'];*/
        
        //return response()->json($dataService);

        $reports2 = ServiceOrder::select('ticket_id')
        ->where('order_service_id', '=', $dataService['order_service_id'])->get();

        $reports2 = preg_replace('/[^0-9]/', '', $reports2);

        Service::insert($dataService);

        $serviceId = Service::select('order_service_id')
        ->where('order_service_id', '=', $dataService['order_service_id'])->get();

        $serviceId = preg_replace('/[^0-9]/', '', $serviceId);
        
        //return response()->json($serviceId);

        $data = ServiceOrder::find($dataService['order_service_id']);
        $data->order_status_id='2';
        $data->save();
        
        //$service = Service::create($request->all());

        return redirect()->route('services.index','id_ticket='.$serviceId)
            ->with('success', __('Report created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $serviceorder = ServiceOrder::pluck('order_service_id','order_service_id');
        $customer = Customer::pluck('name','customer_id');
        $status = ReportStatus::pluck('name','status_report_id');
        $priority = Priority::pluck('name','priority_id');
        return view('service.edit', compact('service','status','serviceorder','customer','priority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $statement = DB::statement("SET @user_id = 9999");
        request()->validate(Service::$rules);

        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success', __('Report updated successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $statement = DB::statement("SET @user_id = 9999");
        // $service = Service::find($id)->delete();
        $service = Service::find($id);
        return response()->json($service);

        return redirect()->route('services.index')
            ->with('success', __('Report deleted successfully'));
    }
}
