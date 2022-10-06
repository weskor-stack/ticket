<?php
 
namespace App\Http\Controllers;
 
use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\SupervisorEmployee;
use App\Models\ServiceTaskSpecific;
use App\Models\ServiceOrder;
use App\Models\Employee;
use App\Models\TypeMaintenance;
use App\Models\TypeService;
use App\Models\ServiceEmployee;

use Illuminate\Http\Request;
 
use Mail;
 
use App\Models\Service;
use App\Models\ServiceReport;
use App\Models\MaterialUsed;
use App\Models\ToolUsed;
use PDF;

use App\Mail\NotifyMail2;
 
 
class NotifyTicketEndController extends Controller
{
     
    public function email()
    {
        $datas = $_GET['id_ticket'];

        $ServiceOrder = ServiceOrder::find($datas);

        $ticket = Ticket::find($ServiceOrder['ticket_id']);

        //$this->client($ticket);
        
        //$this->supervisor($ticket);
       
        // return response()->json($ServiceOrder);
        
        $serviceOrderId = ServiceOrder::select('order_service_id')
        ->where('order_service_id', '=', $ServiceOrder['order_service_id'])->get();

        // return response()->json($serviceOrderId);

        $serviceOrderId = $ServiceOrder['order_service_id'];

        $services = Service::select('order_service_id')
        ->where('order_service_id','=',$serviceOrderId)->get();

        $services = $services[0]['order_service_id'];

    

        $serviceOrder = ServiceOrder::select('order_service_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'order_status_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $services)->get();


        $service3 = Service::select('service_id')
        ->where('order_service_id', '=', $serviceOrder[0]['order_service_id'])->get();

        // $service3 = preg_replace('/[^0-9]/', '', $service3);
        $service3 = $service3[0]['service_id'];

        $service_employees = ServiceEmployee::select('service_employee_id', 'service_id', 'employee_id', 'status_id', 
        'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        // return response()->json($service3);

        $serviceReports = ServiceReport::all();/*select('service_report_id','time_entry', 'time_completion', 'lunchtime', 'service_hours', 'service_extras', 'duration_travel', 'date_service', 'service_id', 'employee_id')
        ->where('service_id', '=', $service3)->get();*/

        
        $service = Service::find($service3);

        $materialUseds = MaterialUsed::select('service_material_id','material_id', 'quantity', 'service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $toolUseds = ToolUsed::select('service_tool_id','tool_id', 'quantity', 'service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        

        $activity2 = ServiceTaskSpecific::select('service_id', 'description', 'previous_evidence', 'subsequent_evidence', 'signature_evidence', 'employee_id', 
        'contact_id','user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();


        $serviceTaskSpecific = new ServiceTaskSpecific();

        // $contacts = Contact::find($ticket['contact_id']);

        $contacts = Contact::select('customer_id','name','last_name','phone','contact_id','job_title','second_last_name')
        ->where('contact_id', '=', $ticket['contact_id'])->get();
        

        $customers = Customer::select('name','customer_id','address','phone')
        ->where('customer_id', '=', $contacts[0]['customer_id'])->get();
        

        $tickets = $ticket['ticket_id'];

        $maintenances = TypeMaintenance::all();

        $typeServices = TypeService::all();

        $employees = Employee::all();

        $serviceOrder2 = ServiceOrder::select('order_service_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'order_status_id', 'user_id', 'date_registration')
        ->where('order_service_id', '=', $datas)->get();
        
        // return response()->json($ticket);

        $pdf = PDF::loadView('service.pdf',['services' => $services], compact('services','service','serviceReports',
        'materialUseds','toolUseds','activity2','serviceTaskSpecific','contacts','customers','tickets','maintenances',
        'serviceOrder2','typeServices','employees','service_employees','service3'));
        $pdf->save(public_path('pdf/') . 'reporte-'.$customers[0]['name'].'-'.$ticket['ticket_id'].'.pdf'); 

        $this->client($ticket);

        // return response()->json($ticket);

        $this->supervisor($ticket);

        //return response()->json($service);

        return redirect()->route('services.index','id_ticket='.$serviceOrderId)
        ->with('success', __('Report completed successfully'));
    }
    
    public function client($ticket)
    {
        /*$customer = Customer::select('name')
        ->where('customer_id', '=', $ticket['customer_id'])->get();

        /*$contact = Contact::select('name','last_name')
        ->where('contact_id', '=', $ticket['contact_id'])->get();*/
        $contact = Contact::find($ticket['contact_id']);
        $customer = Customer::find($contact['customer_id']);
        // return response()->json($customer);
        // $customer = Customer::find($ticket['customer_id']);
        
        
        $receiver1 = new \stdClass();
        $receiver1->name = 'cliente'.' '.$contact['name'].' '. $contact['last_name'].' '.'('.$customer['name'].')'; //nombre del cliente/contacto
        $receiver1->email = $contact['email']; //email del contacto
        
        // return response()->json($customer);
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
        $dataEmail->format = 'ticketclient_end'; //formato del email a enviar
        $dataEmail->subject = $ticket['subject'].' '.'Ticket No:'.' '.$ticket['ticket_id'];
        $dataEmail->paragraph1 = 'Por medio de la presente le comunicamos que el ticket no. '.$ticket['ticket_id'].'; ha sido atendido del siguiente problema:';
        $dataEmail->paragraph2 = '* '.$ticket['problem'];
        $dataEmail->paragraph3 = 'Por lo tanto, el departamento de ventas, se contactará, para dar cierre al servicio, de antemano, gracias.';
        $dataEmail->attach = public_path('pdf/') . 'reporte-'.$customer['name'].'-'.$ticket['ticket_id'].'.pdf';
        
        $this->send_email($dataEmail);
        
        //return response()->success('Great! Successfully send in your mail');
        echo 'Great! Successfully send in your mail';
    }
    
    public function supervisor($ticket)
    {
        $supervisor_employee = '1448';
        $employee = Employee::find($supervisor_employee);

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
        $dataEmail->format = 'ticketsupervisor_end'; //formato del email a enviar
        $dataEmail->subject = $ticket['subject'].' '.'Ticket No:'.' '.$ticket['ticket_id'];
        $dataEmail->paragraph1 = 'Por medio de la presente le comunicamos que se ha cubierto el ticket no. '.$ticket['ticket_id'].'; mediante el cuál se ha realizado el servicio correspondiente del siguiente problema';
        $dataEmail->paragraph2 = '* '.$ticket['problem'];
        $dataEmail->client = __('Customer').':';
        $dataEmail->paragraph3 = '  - '.$customer['name'];
        $dataEmail->contact = __('Contact').':';
        $dataEmail->paragraph4 = '  - '.$contact['name'].' '. $contact['last_name'];
        $dataEmail->email = __('E-mail').':';
        $dataEmail->paragraph5 = '  - '.$contact['email'];
        $dataEmail->attach = public_path('pdf/') . 'reporte-'.$customer['name'].'-'.$ticket['ticket_id'].'.pdf';

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