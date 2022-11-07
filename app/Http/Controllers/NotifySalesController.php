<?php
 
namespace App\Http\Controllers;
 
use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\SupervisorEmployee;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\ServiceOrder;
 
use Mail;
 
use App\Mail\NotifyMail2;
 
use App\Models\MaterialAssigned;
use App\Models\ToolAssigned;
use App\Models\EmployeeOrder;
use App\Models\EmployeeHierarchicalPosition;
use App\Models\HierarchicalPosition;
use App\Models\Hierarchical;
use App\Models\HierarchicalStructure;
use App\Models\OrderEmployeeSchedule;
use PDF;
 
class NotifySalesController extends Controller
{
     
    public function email()
    {
        $datas = $_GET['id_ticket'];

        $serviceOrder = ServiceOrder::find($datas);

        $serviceOrders = ServiceOrder::all();

        // return response()->json($serviceOrder);

        // $this->client($ticket);

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

        $pdf->save(public_path('pdf-orders/') . 'orden-'.$serviceOrder['order_service_id'].'-'.' ticket-'.$tickets['ticket_id'].'.pdf'); 
        
        // return response()->json($serviceOrder);

        $this->supervisor($serviceOrder);
        //return response()->json('Ticket '.$datas);
        return redirect()->route('service-orders.index','id_ticket='.$serviceOrder->order_service_id)
        ->with('success', __('notification sent to sales'));
            //->with('message', 'Notificación de ticket realizada');

    }
    
    public function client($serviceOrder)
    {
        /*$customer = Customer::select('name')
        ->where('customer_id', '=', $ticket['customer_id'])->get();

        /*$contact = Contact::select('name','last_name')
        ->where('contact_id', '=', $ticket['contact_id'])->get();*/
        
        $contact = Contact::find($ticket['contact_id']);
        $customer = Customer::find($contact['customer_id']);
        
        $receiver1 = new \stdClass();
        $receiver1->name = 'cliente'.' '.$contact['name'].' '. $contact['last_name'].' '.'('.$customer['name'].')'; //nombre del cliente/contacto
        $receiver1->email = $contact['email']; //email del contacto
        
        /*$receiver2 = new \stdClass();
        $receiver2->name = 'Cliente Faustino Cruz'; //nombre del cliente/contacto
        $receiver2->email = 'ifaustino@automatyco.com'; //email del contacto*/
        
        $receiver = array(
            $receiver1,
            //$receiver2,
        );
        
        $dataEmail = new \stdClass();
        $dataEmail->sender = 'Israel Faustino Cruz'; //nombre del empleado
        $dataEmail->senderEmail = 'ifaustino@automatyco.com'; //email del empleado
        $dataEmail->receiver = $receiver;
        $dataEmail->format = 'ticketclient'; //formato del email a enviar
        $dataEmail->subject = $ticket['subject'].' '.'Ticket No:'.' '.$ticket['ticket_id'];
        $dataEmail->paragraph1 = 'Por medio de la presente le comunicamos que la orden no. '.$serviceOrder->order_service_id.'; se ha completado el material y las herramientas a previstas a utilizar.';
        $dataEmail->paragraph2 = '* '.$ticket['problem'];
        
        $this->send_email($dataEmail);
        
        //return response()->success('Great! Successfully send in your mail');
        echo 'Great! Successfully send in your mail';
    }
    
    public function supervisor($serviceOrder)
    {
        $employee = Employee::find('1448');
        //$employee = Employee::find($supervisor_employee['supervisor_employee_id']);

        $serviceOrder = ServiceOrder::find($serviceOrder['order_service_id']);
        // return response()->json($serviceOrder);

        $ticket = Ticket::find($serviceOrder['ticket']['ticket_id']);
        $contact = Contact::find($ticket['contact_id']);
        $customer = Customer::find($contact['customer_id']);

        $receiver1 = new \stdClass();
        $receiver1->name = 'supervisor'.' '.$employee['name'].' '.$employee['last_name']; //nombre del supervisor
        $receiver1->email = $employee['email']; //email del supervisor
        
        /*$receiver2 = new \stdClass();
        $receiver2->name = 'Supervisor Faustino Cruz'; //nombre del supervisor
        $receiver2->email = 'ifaustino@automatyco.com'; //email del supervisor*/
        
        $receiver = array(
            $receiver1,
            //$receiver2,
        );
        
        $dataEmail = new \stdClass();
        $dataEmail->sender = 'Israel Faustino Cruz'; //nombre del empleado
        $dataEmail->senderEmail = 'ifaustino@automatyco.com'; //email del empleado
        $dataEmail->receiver = $receiver;
        $dataEmail->format = 'ticketsales'; //formato del email a enviar
        $dataEmail->subject = $ticket['subject'].' '.'Ticket No:'.' '.$ticket['ticket_id'];
        $dataEmail->paragraph1 = 'Por medio de la presente le comunicamos que la orden no. '.$serviceOrder->order_service_id.', se ha completado el material y las herramientas previstas a utilizar, para el servicio del ticket No.'.$ticket['ticket_id'];
        $dataEmail->paragraph2 = '* '.$ticket['problem'];
        $dataEmail->client = __('Customer').':';
        $dataEmail->paragraph3 = '  - '.$customer['name'];
        $dataEmail->contact = __('Contact').':';
        $dataEmail->paragraph4 = '  - '.$contact['name'].' '. $contact['last_name'];
        $dataEmail->email = __('E-mail').':';
        $dataEmail->paragraph5 = '  - '.$contact['email'];
        $dataEmail->attach = public_path('pdf-orders/') . 'orden-'.$serviceOrder['order_service_id'].'-'.' ticket-'.$ticket['ticket_id'].'.pdf';
        $this->send_email($dataEmail);
        
        //return response()->success('Great! Successfully send in your mail');
        echo 'Great! Successfully send in your mail';
    }
    
    public function send_email($dataEmail){
        
        foreach ($dataEmail->receiver as $i => $value){
            $dataEmail->salute = 'Estimado '.$value->name.':';
            
            Mail::to($value->email)->send(new NotifyMail2($dataEmail));
            
            //actualizar que se envió un email en la base de datos
            
        }
        
        /*if (Mail::failures()) {
             return response()->fail('Sorry! Please try again latter');
        }else{
             return response()->success('Great! Successfully send in your mail');
        }//*/
    }
    
}