<div class="box box-info padding-1">
    <div class="box-body">
        <div class="col-auto p-5 text-center">
            <table>
                <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                    <td align="center" hidden><b>Día</b></td>
                    
                    <td style="width:20%">{{ __('Date service')}}</td>
                    <td style="width:8%"><b>{{ __('Entry')}}</b></td>
                    <td style="width:8%"><b>{{ __('Exit')}}</b></td>
                    <td style="width:8%"><b>{{ __('Lunchtime')}}</b></td>
                    <td hidden><b>{{ __('Service hour')}}</b></td>
                    <td style="width:5%"><b>{{ __('Duration travel')}}</b></td>
                    
                    <td style="width:20%">{{ __('Employee')}}</td>
                </tr>
                <tr style="text-align: center">
                    <td style="width:20%">
                        <div class="form-group">
                            {{ Form::date('date', date('Y-m-d'), ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date Service', 'required']) }}
                            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    
                    <td hidden>
                        <div class="form-group">
                            {{ Form::label('order_service_id') }}                
                            <input type="text" name="order_service_id" id="order_service_id" value="{{$serviceOrder->order_service_id}}">
                        </div>
                    </td>

                    <td style="width:5%">
                        <div class="form-group">
                            
                            <input type="text" class="form-control" name="time_entry" id="time_entry" required>
                            
                        </div>
                    </td>
                    <td style="width:5%">
                        <div class="form-group">
                            <!--{{ Form::text('time_completion', $orderEmployeeSchedule->time_completion, ['class' => 'form-control' . ($errors->has('time_completion') ? ' is-invalid' : ''), 'placeholder' => 'Time Completion', 'min'=>'07:00', 'max'=>'23:00','requiered']) }}
                            {!! $errors->first('time_completion', '<div class="invalid-feedback">:message</div>') !!}-->
                            <input type="text" class="form-control" name="time_departure" id="time_departure" required>
                        </div>
                    </td>
                    <td style="width:5%">
                        <div class="form-group">
                            <select class="form-select" id="lunchtime" name="lunchtime" requiered>
                                <option value="0">0 hr.</option>
                                <option value="1">1 hr.</option>
                                <option value="2">2 hrs.</option>
                                <option value="3">3 hrs.</option>
                                <option value="4">4 hrs.</option>
                                <option value="5">5 hrs.</option>
                            </select>
                            <!--{{ Form::time('lunchtime', $orderEmployeeSchedule->lunchtime, ['class' => 'form-control' . ($errors->has('lunchtime') ? ' is-invalid' : ''), 'placeholder' => 'Lunchtime', 'required']) }}
                            {!! $errors->first('lunchtime', '<div class="invalid-feedback">:message</div>') !!}
                            <input type="text" class="form-control" name="time_completion" id="time_completion" required>-->
                        </div>
                    </td>                    
                    
                    <td style="width:5%">
                        <div class="form-group">
                            <!--{{ Form::text('duration_travel', $orderEmployeeSchedule->duration_travel, ['class' => 'form-control' . ($errors->has('duration_travel') ? ' is-invalid' : ''), 'placeholder' =>  __('Duration travel')]) }}
                            {!! $errors->first('duration_travel', '<div class="invalid-feedback">:message</div>') !!}-->

                            <select class="form-select" id="hours_travel" name="hours_travel" requiered>
                                <option value="0">0 hr.</option>
                                <option value="1">1 hr.</option>
                                <option value="2">2 hrs.</option>
                                <option value="3">3 hrs.</option>
                                <option value="4">4 hrs.</option>
                                <option value="5">5 hrs.</option>
                            </select>
                        </div>
                    </td>
                    
                    
                    <td style="width:20%">
                        <div class="form-group">
                            
                            <select class="form-select" id="employee_id" name="employee_id" required>
                                <option value="">--{{ __('Select employee')}}--</option>
                                @foreach ($employee2 as $employee)
                                    @foreach ($employee_order as $order)
                                        @if($employee->employee_id == $order->employee_id)
                                            <option value="{{$order->employee_id}}">{{$employee->name}} {{$employee->last_name}} {{$employee->second_last_name}}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>                            
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    
        <br>
    </div>
    <div class="box-footer mt20" style="text-align:center">
        <button type="submit" class="btn btn-success btn-lg" href="{{ route('service-orders.index') }}"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('services.index') }}"> Cancel</a>-->
    </div>
</div>