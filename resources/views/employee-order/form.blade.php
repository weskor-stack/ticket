<div class="box box-info padding-1">
    <div class="box-body">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        
        <div class="form-group" hidden>
            {{ Form::label('order_service_id') }}
            {{ Form::text('order_service_id', $serviceOrder->order_service_id, ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label( __('Employee')) }}
            <!--{{ Form::select('employee_id', $employee, $employeeOrder->employee_id, ['class' => 'form-select' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => __('Employee')]) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}-->
            <br>
            <select class="form-select" id="employee_id" name="employee_id" style="width:100%" required>
                <option value="">--{{ __('Select employee')}}--</option>
                @foreach ($employee_assigned as $item)
                    <option value="{{$item->employee_id}}">{{$item->name}} {{$item->last_name}}</option>
                @endforeach
            </select>

        </div>
        
        <br>

    </div>
    <div class="box-footer mt20" style="text-align:center;">
        <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('service-orders.index') }}"> Cancel</a>-->
    </div>
</div>