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
 
use App\Mail\NotifyMail;
 
 
class NotifySalesController extends Controller
{
     
    public function email()
    {
        $datas = $_GET['id_ticket'];

        $serviceOrder = ServiceOrder::find($datas);

        // return response()->json($serviceOrder);

        // $this->client($ticket);
        
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

        

        $ticket = Ticket::find($serviceOrder->ticket_id);
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
        $this->send_email($dataEmail);
        
        //return response()->success('Great! Successfully send in your mail');
        echo 'Great! Successfully send in your mail';
    }
    
    public function send_email($dataEmail){
        
        foreach ($dataEmail->receiver as $i => $value){
            $dataEmail->salute = 'Estimado '.$value->name.':';
            
            Mail::to($value->email)->send(new NotifyMail($dataEmail));
            
            //actualizar que se envió un email en la base de datos
            
        }
        
        /*if (Mail::failures()) {
             return response()->fail('Sorry! Please try again latter');
        }else{
             return response()->success('Great! Successfully send in your mail');
        }//*/
    }
    
}