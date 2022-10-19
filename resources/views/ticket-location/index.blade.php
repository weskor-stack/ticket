@extends('layouts.app')

@section('template_title')
    Ticket Location
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ticket Location') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ticket_locations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Ticket Id</th>
										<th>Factory Id</th>
										<th>Site</th>
										<th>Location</th>
										<th>User Id</th>
										<th>Date Registration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ticketLocations as $ticketLocation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ticketLocation->ticket_id }}</td>
											<td>{{ $ticketLocation->factory_id }}</td>
											<td>{{ $ticketLocation->site }}</td>
											<td>{{ $ticketLocation->location }}</td>
											<td>{{ $ticketLocation->user_id }}</td>
											<td>{{ $ticketLocation->date_registration }}</td>

                                            <td>
                                                <form action="{{ route('ticket_locations.destroy',$ticketLocation->ticket_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ticket_locations.show',$ticketLocation->ticket_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ticket_locations.edit',$ticketLocation->ticket_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ticketLocations->links() !!}
            </div>
        </div>
    </div>
@endsection
