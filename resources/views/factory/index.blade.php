@extends('layouts.app')

@section('template_title')
    Factory
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Factory') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('factories.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Factory Id</th>
										<th>Key</th>
										<th>Name</th>
										<th>Address</th>
										<th>Customer Id</th>
										<th>Contact Id</th>
										<th>User Id</th>
										<th>Date Registration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($factories as $factory)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $factory->factory_id }}</td>
											<td>{{ $factory->key }}</td>
											<td>{{ $factory->name }}</td>
											<td>{{ $factory->address }}</td>
											<td>{{ $factory->customer_id }}</td>
											<td>{{ $factory->contact_id }}</td>
											<td>{{ $factory->user_id }}</td>
											<td>{{ $factory->date_registration }}</td>

                                            <td>
                                                <form action="{{ route('factories.destroy',$factory->factory_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('factories.show',$factory->factory_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('factories.edit',$factory->factory_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $factories->links() !!}
            </div>
        </div>
    </div>
@endsection
