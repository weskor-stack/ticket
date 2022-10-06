<?php
 
namespace App\Http\Controllers;
 
use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\SupervisorEmployee;
use App\Models\Employee;
use Illuminate\Http\Request;
 
use Mail;
 
use App\Mail\NotifyMail;
 
 
class NotifyTicketController extends Controller
{
     
    public function email()
    {
        $datas = $_GET['id_ticket'];

        $ticket = Ticket::latest('ticket_id')->first();

        $this->client($ticket);
        
        $this->supervisor($ticket);
        //return response()->json('Ticket '.$datas);
        return redirect('tickets')
        ->with('success', 'Ticket '.$datas.' '.__('created successfully'));
            //->with('message', 'Notificación de ticket realizada');

    }
    
    public function client($ticket)
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
        $dataEmail->paragraph1 = 'Por medio de la presente le comunicamos que a su nombre se ha abierto el ticket no. '.$ticket['ticket_id'].'; mediante el cuál se atenderá la siguiente solicitud:';
        $dataEmail->paragraph2 = '* '.$ticket['problem'];
        
        $this->send_email($dataEmail);
        
        //return response()->success('Great! Successfully send in your mail');
        echo 'Great! Successfully send in your mail';
    }
    
    public function supervisor($ticket)
    {
        $employee = Employee::find('1448');
        //$employee = Employee::find($supervisor_employee['supervisor_employee_id']);

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
        $dataEmail->format = 'ticketsupervisor'; //formato del email a enviar
        $dataEmail->subject = $ticket['subject'].' '.'Ticket No:'.' '.$ticket['ticket_id'];
        $dataEmail->paragraph1 = 'Por medio de la presente le comunicamos que se ha abierto el ticket no. '.$ticket['ticket_id'].'; mediante el cuál se atenderá la siguiente solicitud:';
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