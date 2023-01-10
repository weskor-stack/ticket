<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use App\Models\ServiceReport;
use App\Models\OrderStatus;
use App\Models\Ticket;
use App\Models\TypeMaintenance;
use App\Models\TypeService;
use App\Models\Service;
use App\Models\ReportStatus;
use App\Models\Priority;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Material;
use App\Models\UnitMeasure;
use App\Models\MaterialAssigned;
use App\Models\ToolAssigned;
use App\Models\Tool;
use App\Models\EmployeeOrder;
use App\Models\{Employee,Hierarchical,HierarchicalPosition,EmployeeHierarchicalPosition,HierarchicalStructure, TicketLocation, Factory};
use App\Models\Department;
use App\Models\SupervisorEmployee;
use App\Models\OrderEmployeeSchedule;
use App\Models\OrderPurchase;

use DB;
use Illuminate\Http\Request;
use PDF;

/**
 * Class ServiceOrderController
 * @package App\Http\Controllers
 */
class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $_GET['id_ticket'];
        
        $serviceOrders = ServiceOrder::all();

        /*$serviceOrder2 = ServiceOrder::select('order_service_id', 'date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('ticket_id', '=', $datas)->get();

Ticket
        //return response()->json($serviceOrder);

        return view('service-order.index', compact('serviceOrders','serviceOrder2'))
            ->with('i', (request()->input('page', 1) - 1) * $serviceOrders->perPage());*/
        $serviceOrder_factory = ServiceOrder::select('order_service_id', 'date_order', 'ticket_id', 'order_status_id', 'type_maintenance_id', 'type_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $datas)->get();

        $ticket_location = TicketLocation::find($serviceOrder_factory[0]['ticket_id']);/*select('ticket_id','factory_id','site','location')
        ->where('ticket_id', '=', $serviceOrder_factory[0]['ticket_id'])->get();*/
        

        $factories = Factory::find($ticket_location['factory_id']);/*select( 'factory_id', 'key', 'name', 'address', 'customer_id', 'contact_id', 'user_id', 'date_registration')
        ->where('factory_id', '=', $ticket_location[0]['factory_id'])->get();*/

        $ticketLocation = TicketLocation::find($serviceOrder_factory[0]['ticket_id']);


        // return response()->json($factories);

        // $serviceOrders = ServiceOrder::paginate();
        
        /*$service = Service::select('service_id', 'date_service', 'oreder_service_id', 'service_status_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', '2')->get();*/
        
        $service = Service::pluck('order_service_id','service_id');

        $materialAssigned = new MaterialAssigned();
        $material = Material::select(DB::raw("CONCAT(material.key, ' - ', material.name) as full_name"))
        ->get()->pluck('full_name');
        $materials = Material::all();
        $unit_measure = UnitMeasure::all();
        //$material = Material::pluck('key','material_id');

        $toolAssigned = new ToolAssigned();
        $tool = Tool::pluck('key','tool_id');
        $tools = Tool::all();

        $employeeOrder = new EmployeeOrder();
        $employee = Employee::pluck('name','employee_id');
        $employees = Employee::select(DB::raw("CONCAT(employee.name, ' ', employee.last_name) as full_name"))
        ->get()->pluck('full_name');
        $employee2 = Employee::all();
        /*$serviceOrder = ServiceOrder::select('order_service_id')
        ->where('ticket_id', '=', $datas)->get();*/

        //$serviceOrder_all = ServiceOrder::select('order_service_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'order_status_id', 'user_id', 'date_registration')
        $serviceOrder_all = ServiceOrder::select('order_service_id')
        ->where('order_service_id', '=', $datas)->get();

        /*$serviceOrder = str_replace('order_service_id','',$serviceOrder);
        $serviceOrder = $serviceOrder[6];*/

        $serviceOrder_all = $serviceOrder_all[0]['order_service_id'];

        // return response()->json($serviceOrder_all);

        $serviceOrder2 = ServiceOrder::select('order_service_id')
        ->where('order_service_id', '=', $datas)->get();
        
        $serviceOrder2 = $serviceOrder2[0]['order_service_id'];

        // return response()->json($serviceOrder2);
        
        $serviceOrder = ServiceOrder::find($serviceOrder2);

        $serviceOrder_id = $serviceOrder['order_status_id'];

        // return response()->json($serviceOrder_id);

        $serviceOrder2 = ServiceOrder::select('order_service_id')
        ->where('order_service_id', '=', $datas)->get();

        $materialAssigneds = MaterialAssigned::select('order_material_id', 'quantity', 'order_service_id', 'user_id', 'date_registration','material_id')
        ->where('order_service_id', '=', $serviceOrder_all)->get();

        //return response()->json($serviceOrder_all[0]);

        $toolAssigneds = ToolAssigned::select('order_tool_id', 'quantity', 'order_service_id', 'user_id', 'date_registration','tool_id')
        ->where('order_service_id', '=', $serviceOrder_all)->get();

        //return response()->json($toolAssigneds);

        $employeeOrders = EmployeeOrder::select('order_service_id', 'employee_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder_all)->get();

        $employeeOrders_data = Employee::all();/*select('employee_id','name','last_name')
        ->where('employee_id', '=', $employeeOrders[0]['employee_id'])->get();*/

        $employeeOrders2 = EmployeeOrder::select('employee_id')
        ->where('order_service_id', '=', $serviceOrder_all)->get();

        $reports2 = ServiceOrder::select('order_service_id', 'date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'order_status_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $datas)->get();

        $service = new Service();
        //$status = ReportStatus::pluck('name','status_report_id');
        
        //$serviceReport = ServiceReport::pluck('service_id','service_id');
        //return response()->json($employeeOrders_data);

        $tickets = Ticket::select('ticket_id')
        ->where('ticket_id', '=', $reports2[0]['ticket_id'])->get();
        

        $serviceOrder3 = ServiceOrder::select('order_service_id')
        ->where('order_service_id', '=', $datas)->get();

        $serviceOrder3 = $serviceOrder3[0]['order_service_id'];

        $materialAssigneds_2 = MaterialAssigned::select('material_id')
        ->where('order_service_id', '=', $serviceOrder3)->get();

        //$materialAssigneds_2 = preg_replace('/[^0-9]/', '', $materialAssigneds_2);

        $materialAssigneds_3 = MaterialAssigned::all();
        //return response()->json($materialAssigneds);
        
        $toolAssigneds_2 = ToolAssigned::select('tool_id')
        ->where('order_service_id', '=', $serviceOrder3)->get();
        //return response()->json($employeeOrders2);

        $supervisors = SupervisorEmployee::all();
        //$supervisors = SupervisorEmployee::pluck('supervisor_employee_id','department_id');

        /*$material2 = Material::whereNotIn('material_id', function($q){
            $q->select('material_id')->from('material_assigned');
        })->get();*/

        $material2 = Material::where('stock', '!=', 0)->whereNotIn('material_id', MaterialAssigned::select('material_id')
        ->where('order_service_id', '=', $serviceOrder3))
        ->get();

        //$serviceOrder3 = (int)$serviceOrder3;

        /*$tool2 = Tool::whereNotIn('tool_id', function($q){
            $q->select('tool_id')->from('tool_assigned')->where('order_service_id', '=', '2');
        })->get();*/

        $tool2 = Tool::where('stock', '!=', 0)->select('tool_id','key', 'name', 'stock', 'unit_measure_id', 'user_id', 'date_registration')->whereNotIn('tool_id', ToolAssigned::select('tool_id')
        ->where('order_service_id', '=', $serviceOrder3))
        ->get();

        //return response()->json($material2);
        /*$tool2 = DB::table('tool')->select('tool_id','key', 'name', 'stock', 'unit_measure_id', 'user_id', 'date_registration')->whereNotIn('tool_id', DB::table('tool_assigned')->select('tool_id')
        ->where('order_service_id', '=', $serviceOrder3))->get();*/

        $employee_assigned = Employee::whereNotIn('employee_id', EmployeeOrder::select('employee_id')
        ->where('order_service_id', '=', $serviceOrder3))->get();

        $materialAssigneds4 = Material::whereIn('material_id', MaterialAssigned::select('material_id')
        ->where('order_service_id', '=', $serviceOrder3))->get();
        //return response()->json($materialAssigneds4);
        
        $tickets_contact = Ticket::select('contact_id')
        ->where('ticket_id', '=', $reports2[0]['ticket_id'])->get();

        //$tickets_contact = preg_replace('/[^0-9]/', '', $tickets_contact);

        $contacts = Contact::select('customer_id','name','last_name','phone')
        ->where('contact_id', '=', $tickets_contact[0]['contact_id'])->get();

        $customers = Customer::select('name','customer_id','address','phone')
        ->where('customer_id', '=', $contacts[0]['customer_id'])->get();

        $customers2 = Customer::find($contacts[0]['customer_id']);

        $factory_customer = Factory::select('factory_id','name')
        ->where('customer_id', '=', $customers2['customer_id'])->get();

        // return response()->json($factory_customer);
        $employee_hierarchical_position = EmployeeHierarchicalPosition::all();/*('hierarchical_position_id','employee_id')
        ->where('employee_id', '=', $employeeOrders_data[0]['employee_id'])->get();*/

        $hierarchical_position = HierarchicalPosition::all();/*select('hierarchical_position_id','name','hierarchical_id')
        ->where('hierarchical_position_id', '=', $employee_hierarchical_position[0]['hierarchical_position_id'])->get();*/

        $hierarchical = Hierarchical::all();/*select('hierarchical_id','name','position')
        ->where('hierarchical_id', '=', $hierarchical_position[0]['hierarchical_id'])->get();*/

        $hierarchical_structure = HierarchicalStructure::all();
        /*\DB::table('Employee.hierarchical_structure')->select('employee_hierarchical_position.hierarchical_position_id','hierarchical_structure.superior_hierarchical_position_id')
        ->join('Employee.employee_hierarchical_position', 'Employee.employee_hierarchical_position.hierarchical_position_id', 
        '=', 'Employee.hierarchical_structure.superior_hierarchical_position_id')
            ->get();
        /*$hierarchical_structure = HierarchicalStructure::select('hierarchical_position_id','superior_hierarchical_position_id')
        ->where('hierarchical_position_id', '=', $hierarchical_position[0]['hierarchical_position_id'])->get();*/

        //return response()->json($employee);

        $shcedules = OrderEmployeeSchedule::select('order_employee_schedule_id', 'time_entry', 'time_departure', 'lunchtime', 
        'hours_service', 'hours_travel', 'date', 'order_service_id', 'employee_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $datas)->get();

        $orderEmployeeSchedule = new OrderEmployeeSchedule();
        
        $employee_order = EmployeeOrder::select('order_service_id','employee_id','status_id')
        ->where('order_service_id', '=', $serviceOrder['order_service_id'])->get();

        // $employee_assigned = Employee::whereNotIn('employee_id', EmployeeOrder::select('employee_id')
        // ->where('order_service_id', '=', $serviceOrder3))->get();

        // $employee_order2 = EmployeeOrder::select('employee_id')
        // ->where('order_service_id', '=', $serviceOrder['order_service_id'])->get();
        
        // return response()->json($employee_order);


        $orderPurchase = new OrderPurchase();

        $orderPurchases = OrderPurchase::select('order_service_id','purchase_id','key')
        ->where('order_service_id', '=', $datas)->get();

        // $orderPurchase2 = OrderPurchase::find($orderPurchases[0]['purchase_id']);

        // return response()->json($orderPurchases);

        return view('service-order.index', compact('serviceOrders','serviceOrder','serviceOrder_all','service','materialAssigned','material','toolAssigned','tool','materialAssigneds','toolAssigneds','employeeOrder','employee','employeeOrders','reports2',
        'tickets','materialAssigneds_2','materials','tools','supervisors','employees','employee2','unit_measure','material2','tool2','employee_assigned',
        'contacts','customers','employeeOrders_data','employee_hierarchical_position','hierarchical_position','hierarchical',
<<<<<<< HEAD
        'hierarchical_structure','shcedules','orderEmployeeSchedule','employee_order','orderPurchase','orderPurchases',
        'serviceOrder_factory','ticket_location','factories','customers2','ticketLocation','factory_customer','serviceOrder_id'));
=======
        'hierarchical_structure','shcedules','orderEmployeeSchedule','employee_order','orderPurchase','orderPurchases', //'orderPurchase2',
        'serviceOrder_factory','ticket_location','factories','customers2','ticketLocation','factory_customer','serviceOrder_id'))
            ->with('i', (request()->input('page', 1) - 1) * $serviceOrders->perPage());
>>>>>>> 18d56eb7ac8b1920843f169b2446b8366b3482dc
    }

    public function pdf()
    {
        $datas = $_GET['id_ticket'];
        $serviceOrders = ServiceOrder::paginate();
        $serviceOrder2 = ServiceOrder::select('order_service_id')
        ->where('order_service_id', '=', $datas)->get();
        // $serviceOrder2 = preg_replace('/[^0-9]/', '', $serviceOrder2);
        $serviceOrder = ServiceOrder::find($serviceOrder2);

        $serviceOrder = $serviceOrder[0];

        $tickets = Ticket::find($serviceOrder['ticket_id']);
        // return response()->json($serviceOrder);
        $serviceOrder_all = ServiceOrder::select('order_service_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'order_status_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $datas)->get();
        //$serviceOrder_all = preg_replace('/[^0-9]/', '', $serviceOrder_all);

        $serviceOrder_all = $serviceOrder_all[0]['order_service_id'];

        $materialAssigneds = MaterialAssigned::select('order_material_id', 'material_id', 'quantity', 'order_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder_all)->get();
        
        $toolAssigneds = ToolAssigned::select('order_tool_id', 'quantity', 'tool_id', 'order_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder_all)->get();

        $employeeOrders = EmployeeOrder::select('order_service_id', 'employee_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder_all)->get();

        $supervisors = SupervisorEmployee::all();
        
        $contacts = Contact::all();

        $customers = Customer::all();

        $employees = Employee::all();/*select('employee_id','name','last_name','second_last_name','email')
        ->where('employee_id','=',$employeeOrders['employee_id']);*/

        $employee_hierarchical_position = EmployeeHierarchicalPosition::all();

        $hierarchical_position = HierarchicalPosition::all();

        $hierarchical = Hierarchical::all();

        $hierarchical_structure = HierarchicalStructure::all();
        // return response()->json($serviceOrder);

        $shcedules = OrderEmployeeSchedule::select('order_employee_schedule_id', 'time_entry', 'time_departure', 'lunchtime', 
        'hours_service', 'hours_travel', 'date', 'order_service_id', 'employee_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $datas)->get();

        $employee2 = Employee::all();

        //return view('service-order.pdf', compact('serviceOrders','serviceOrder'));
        $pdf = PDF::loadView('service-order.pdf',['service-orders' => $serviceOrders], compact('serviceOrders','serviceOrder',
        'materialAssigneds','toolAssigneds','employeeOrders','supervisors','contacts','customers','tickets','employees',
        'employee_hierarchical_position','hierarchical_position','hierarchical','hierarchical_structure','shcedules','employee2'));
        return $pdf->stream();
        // return $pdf->download('order.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceOrder = new ServiceOrder();
        $ticket = Ticket::pluck('customer_id','ticket_id');
        $customer = Customer::pluck('name','customer_id');
        $maintenance = TypeMaintenance::pluck('name','type_maintenance_id');
        $service = TypeService::pluck('name','type_service_id');
        $status = OrderStatus::pluck('name','order_status_id'); 

        $materialAssigned = new MaterialAssigned();
        $material = Material::pluck('key','material_id');

        $toolAssigned = new ToolAssigned();
        $tool = Tool::pluck('key','tool_id');

        $service = Service::pluck('order_service_id','service_id');
        
        return view('service-order.create', compact('serviceOrder','ticket','maintenance','service','status','service','materialAssigned','material','toolAssigned','tool'));
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
        request()->validate(ServiceOrder::$rules);

        $serviceOrder = request()->except('_token');

        /*$url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id_ticket']);
        $serviceOrder['ticket_id']=$results['id_ticket'];*/

        $serviceOrder['order_status_id']=1;
        $serviceOrder['user_id']=9999;
        
        //return response()->json($serviceOrder);
        ServiceOrder::insert($serviceOrder);

        $lastOrder = ServiceOrder::latest('order_service_id')->first();

        //return response()->json($lastOrder);

        $data = Ticket::find($serviceOrder['ticket_id']);
        $data->ticket_status_id='2';
        $data->save();

        //$serviceOrder = ServiceOrder::create($request->all());

        return redirect()->route('service-orders.index','id_ticket='. $lastOrder['order_service_id'])
            ->with('success', __('Service Order') .' '.__('created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceOrder = ServiceOrder::find($id);

        $serviceOrders = ServiceOrder::paginate();
        
        $service = Service::select('service_id', 'date_service', 'service_status_id', 'order_service_id', 'priority_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', '1')->get();
        
        $service = Service::pluck('order_service_id','service_id');

        $materialAssigned = new MaterialAssigned();
        $material = Material::pluck('key','material_id');

        $toolAssigned = new ToolAssigned();
        $tool = Tool::pluck('key','tool_id');

        $employeeOrder = new EmployeeOrder();
        $employee = Employee::pluck('name','employee_id');
        /*$serviceOrder = ServiceOrder::select('order_service_id')
        ->where('ticket_id', '=', $datas)->get();*/

        $serviceOrder2 = ServiceOrder::select('order_service_id')->get();

        /*$serviceOrder = str_replace('order_service_id','',$serviceOrder);
        $serviceOrder = $serviceOrder[6];*/

        $serviceOrder2 = preg_replace('/[^0-9]/', '', $serviceOrder2);

        $materialAssigneds = MaterialAssigned::select('order_material_id', 'quantity', 'unit_measure', 'usage', 'order_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder2)->get();

        $toolAssigneds = ToolAssigned::select('order_tool_id', 'quantity', 'unit_measure', 'usage', 'order_service_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder2)->get();

        $employeeOrders = EmployeeOrder::select('order_service_id', 'employee_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder2)->get();

        $reports2 = ServiceOrder::select('order_service_id', 'date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'order_status_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $serviceOrder2)->get();

        return view('service-order.show', compact('serviceOrder','serviceOrders','serviceOrder2','service','materialAssigned','material','toolAssigned','tool','materialAssigneds','toolAssigneds','employeeOrder','employee','employeeOrders','reports2'))
        ->with('i', (request()->input('page', 1) - 1) * $serviceOrders->perPage());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceOrder = ServiceOrder::find($id);
        $ticket = Ticket::pluck('subject','ticket_id');
        $customer = Customer::pluck('name','customer_id');
        $maintenance = TypeMaintenance::pluck('name','type_maintenance_id');
        $service = TypeService::pluck('name','type_service_id');
        $status = OrderStatus::pluck('name','order_status_id');
        return view('service-order.edit', compact('serviceOrder','customer','maintenance','service','status','ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ServiceOrder $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceOrder $serviceOrder)
    {
        request()->validate(ServiceOrder::$rules);

        $statement = DB::statement("SET @user_id = 9999");
        $serviceOrders = ServiceOrder::select('order_service_id')
        ->where('order_service_id', '=', $serviceOrder->ticket_id)->get();
        
        //return response()->json($request);

        //$reports2 = preg_replace('/[^0-9]/', '', $serviceOrders);

        //return response()->json($reports2);

        $serviceOrder->update($request->all());

        return redirect()->route('service-orders.index','id_ticket='.$serviceOrder->order_service_id)
            ->with('success', __('Service Order') .' '.__('updated successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        //$serviceOrder = ServiceOrder::find($id)->delete();

        $serviceOrder = ServiceOrder::find($id);
        return response()->json($serviceOrder);
        
        return redirect()->route('service-orders.index')
            ->with('success', __('Service Order') .' '.__('deleted successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function inicio()
    {
        // $serviceOrders = ServiceOrder::paginate();
        $datas = $_GET['id_ticket'];
        $serviceOrders = ServiceOrder::select('order_service_id', 'date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'order_status_id', 'user_id', 'date_registration')
        ->where('ticket_id', '=', $datas)->paginate();


        //return response()->json($serviceOrders);

        return view('service-order.allOrder', compact('serviceOrders'))
        ->with('i', (request()->input('page', 1) - 1) * $serviceOrders->perPage());
    }
}
