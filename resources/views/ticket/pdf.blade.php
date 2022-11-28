<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('css/pdf_tables.css') }}" rel="stylesheet" type="text/css">
    
</head>
<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <table id="customers5">
            <tr>
                <th style="width:30%"><img src="{{ public_path('images/logoAutomatyco.png') }}" width="80%" height="auto" style="text-align: center;"/></th>
                <th style="width:30%">{{ __('Tickets')}}</th>
                <th style="width:20%"><b>{{ __('No. Ticket')}}:</b> {{ $tickets_number }}</th>
                <th style="width:20%"><b>{{ __('Date')}}:</b> <br> <?php echo date("d-m-Y");?></th>
            </tr>
        </table>
    </header>
    <footer>
        <!-- PIE DE PÁGINA -->
    </footer>

    <h2>Lista de Tickets</h2>
    
    <div>
        <table id="customers2">
            <thead>
                <tr>                                        
					<th>{{ __('Subject') }}</th>
					<th>{{ __('Problem') }}</th>
					<th>{{ __('Tickets date') }}</th>
					<th>{{ __('Tickets status') }}</th>
					<th>{{ __('Customer') }}</th>
                    <!-- <th>{{ __('Contact') }}</th> -->
                    <th>{{ __('Priority') }}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                                           
						<td>{{ $ticket->subject }}</td>
						<td>{{ $ticket->problem }}</td>
						<td>{{\Carbon\Carbon::parse($ticket->date_ticket)->format('d/m/Y')}}</td>
						<td>{{ $ticket->ticketStatus->name }}</td>

                        @foreach ($contacts as $contact)
                            @if ($contact->contact_id == $ticket->contact_id)
                                @foreach($customers as $customer)
                                    @if ($contact->customer_id == $customer->customer_id)
                                        <td style="width: 15%;">{{ $customer->name }}</td>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @foreach ($contacts as $contact)
                            @if ($contact->contact_id == $ticket->contact_id)
                                <!-- <td style="width: 15%;">{{ $contact->name }} {{ $contact->last_name }}</td> -->
                            @endif
                        @endforeach
                        
                        <td>{{ $ticket->ticketPriority->name }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>