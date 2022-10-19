<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" hidden>
            {{ Form::label('order_service_id') }}
            {{ Form::text('order_service_id', $serviceOrder->order_service_id, ['class' => 'form-control' . ($errors->has('order_service_id') ? ' is-invalid' : ''), 'placeholder' => 'Order Service Id']) }}
            {!! $errors->first('order_service_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('purchase_id') }}
            {{ Form::text('purchase_id', 0, ['class' => 'form-control' . ($errors->has('purchase_id') ? ' is-invalid' : ''), 'placeholder' => 'Purchase Id']) }}
            {!! $errors->first('purchase_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('key') }}
            {{ Form::text('key', $orderPurchase->key, ['class' => 'form-control' . ($errors->has('key') ? ' is-invalid' : ''), 'placeholder' => 'Key', 'maxlength' => 10, 'minlength'=>5,'required']) }}
            {!! $errors->first('key', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>

    </div>
    <div class="box-footer mt20">
    <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
    </div>
</div>