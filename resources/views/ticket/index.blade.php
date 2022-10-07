
@extends('layouts.app')
@extends('layouts.hover')
@section('template_title')
    Ticket
@endsection

@section('content')
    <div class="container-fluid" >
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Ticket') }}
                            </span>

                            <div class="float-right" style="text-align:right">
                                <a href="{{ route('ticket.pdf') }}" class="btn btn-primary btn-lg"  data-placement="left" title="{{ __('PDF') }}"><i class="material-icons">book</i>&nbsp; {{ __('PDF') }}</a>
&nbsp;
                                <a href="{{ route('tickets.create') }}" class="btn btn-primary btn-lg"  data-placement="left" title="{{ __('New Ticket') }}"><i class="material-icons">bookmarks</i>&nbsp; {{ __('New Ticket') }}</a>
                                <button class="btn" width="5%" data-toggle="modal" data-target="#dialogo2" title="{{ __('Help') }}">
                                    <!--<img src="{!! asset('images/user_guide/ayuda.png')!!}" width="20">-->
                                    <i class="material-icons">help</i>
                                </button>
                                <!--@method('GET')
                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#dialogo0" hidden>{{ __('Create report') }}</button>
                                @method('GET')
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#dialogo1">{{ __('New ticket') }}</button>-->
                            </div>
                            
                                                   
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body" >
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr style="text-align: center">
                                        <th>No</th>
                                        
										<th style="width: 14%;">{{ __('Subject') }}</th>
										<th style="width: 18%;">{{ __('Problem') }}</th>
										<th style="width: 5%;" >{{ __('Tickets date') }}</th>
										<th style="width: 10%;">{{ __('Tickets status') }}</th>
										<th style="width: 10%;">{{ __('Customer') }}</th>
                                        <th style="width: 10%;">{{ __('Priority') }}</th>
										<th style="width: 20%;">{{ __('Actions') }}</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                    
                                    
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td style="width: 4%;">{{ ++$i }}</td>
                                            
											<td style="width: 14%;">{{ $ticket->subject }}</td>
											<td style="width: 18%;">{{ $ticket->problem }}</td>
											<td style="width: 5%;">{{\Carbon\Carbon::parse($ticket->date_ticket)->format('d/m/Y')}}</td>
											<td style="width: 10%;">{{ $ticket->ticketStatus->name }}</td>

                                            @foreach ($contacts as $contact)
                                                @if ($contact->contact_id == $ticket->contact_id)
                                                    @foreach($customers as $customer)
                                                        @if ($contact->customer_id == $customer->customer_id)
                                                            <td style="width: 15%;">{{ $customer->name }}</td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
											
                                            <td style="width: 10%;">{{ $ticket->ticketPriority->name }}</td>

                                            <td style="width: 20%;">
                                                <form action="{{ route('tickets.destroy',$ticket->ticket_id) }}" method="POST">
                                                    
                                                    <!--<a class="btn btn-outline-success" href="{{ route('tickets.edit',$ticket->ticket_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    <a class="btn btn-outline-warning" href="{{ route('service-orders.create','id_ticket='.$ticket->ticket_id) }}"><i class="fa fa-fw fa-trash"></i> Create order</a>-->

                                                    @if($ticket->ticket_status_id == '1')
                                                        @method('GET')
                                                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo0" hidden>Show</button>
                                                        @method('GET')
                                                        <button title="{{ __('Create order') }}" type="button" class="open-AddDialog btn btn-primary" data-toggle="modal" data-target="#dialogo1" data-id="{{$ticket->ticket_id}}"><i class="material-icons" style="font-size:20px">bookmarks</i>&nbsp; {{ __('Create order') }}</button>
                                                        <a title="{{ __('Order') }}" class="btn btn-warning" href="{{ route('inicio','id_ticket='.$ticket->ticket_id) }}" hidden><i class="material-icons" style="font-size:20px">visibility</i>&nbsp; {{ __('Show Orders') }}</a>
                                                        
                                                    @else
                                                        @if($ticket->ticket_status_id == '4')
                                                            <a title="{{ __('Order') }}" class="btn btn-warning" href="{{ route('inicio','id_ticket='.$ticket->ticket_id) }}"><i class="material-icons" style="font-size:20px">visibility</i>&nbsp; {{ __('Show Orders') }}</a>
                                                        @else
                                                            
                                                            <button title="{{ __('Create order') }}" type="button" class="open-AddDialog btn btn-primary" data-toggle="modal" data-target="#dialogo1" data-id="{{$ticket->ticket_id}}"><i class="material-icons" style="font-size:20px">bookmarks</i>&nbsp; {{ __('Create order') }}</button>
                                                            <a title="{{ __('Order') }}" class="btn btn-warning" href="{{ route('inicio','id_ticket='.$ticket->ticket_id) }}"><i class="material-icons" style="font-size:20px">visibility</i>&nbsp; {{ __('Show Orders') }}</a>
                                                        @endif
                                                    @endif

                                                    <div class="modal fade" id="dialogo0">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                        
                                                            <!-- cabecera del diálogo -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Generate Order</h4>
                                                            </div>
                                                        
                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body">
                                                                
                                                                {{ $ticket->ticket_id }}
                                                                <div class="card-body">
                                                                    <form method="POST" action="{{ route('service-orders.store') }}"  role="form" enctype="multipart/form-data">
                                                                        @csrf

                                                                        @include('service-order.form')

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- pie del diálogo -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                                                    <div class="modal fade" id="dialogo1" data-backdrop="static">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                        
                                                            <!-- cabecera del diálogo -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{{ __('Generate Order')}}</h4>
                                                            </div>
                                                        
                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body">
                                                                
                                                                <div class="card-body">
                                                                    <form method="POST" action="{{ route('service-orders.store') }}"  role="form" enctype="multipart/form-data">
                                                                        @csrf

                                                                        @include('service-order.form')

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- pie del diálogo -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons" style="font-size:20px">block</i>&nbsp; {{ __('Close')}}</button>
                                                            </div>
                                                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                    
                                                    <div class="modal modal-fullscreen fade" id="dialogo2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                                            <div class="modal-content">
                                                        
                                                            <!-- cabecera del diálogo 
                                                            <div class="modal-header">
                                                                <h1 class="modal-title">{{ __('Help')}}</h1>
                                                                <img src="{!! asset('images/question.png')!!}" width="5%">
                                                            </div>-->
                                                        
                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body" style="background-color: #d6dbdf;">
                                                                
                                                                <div class="card-body">
                                                                    <img src="{!! asset('images/user_guide/user_guide1.png')!!}" width="88%">
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- pie del diálogo -->
                                                            <div class="modal-footer" style="background-color: #d6dbdf;">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}</button>
                                                            </div>
                                                        
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tickets->links() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).on("click", ".open-AddDialog", function () {
            var ticketId = $(this).data('id'); 
            $(".modal-body #ticket_id").val( ticketId );
        });
    </script>
@endsection
