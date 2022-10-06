<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group" hidden>
            {{ Form::label('Date service') }}
            {{ Form::date('date_service', date('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_service') ? ' is-invalid' : ''), 'placeholder' => 'Date Service']) }}
            {!! $errors->first('date_service', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('Status:') }}
            {{ Form::text('service_status_id', 1, ['class' => 'form-control' . ($errors->has('service_status_id') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('service_status_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group" hidden>
            {{ Form::label('service order') }}
            {{ Form::text('order_service_id', $serviceOrder->order_service_id, ['class' => 'form-control' . ($errors->has('order_service_id') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
            {!! $errors->first('order_service_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 9999) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <br>

    </div>
    <div class="box-footer mt20" style="text-align:center">
        <button type="submit" class="btn btn-success"><i class="far fa-thumbs-up"></i>&nbsp;{{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('services.index','id='.$service->service_id) }}"> Cancel</a>-->
    </div>
</div>