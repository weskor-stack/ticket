<div class="box box-info padding-1">
    <div class="box-body">
        
        
        
        <div class="form-group">
            {{ Form::label(__('Key')) }}
            {{ Form::text('key', $orderPurchase->key, ['class' => 'form-control' . ($errors->has('key') ? ' is-invalid' : ''), 'placeholder' => __('Key'), 'maxlength' => 10, 'minlength'=>5,'required']) }}
            {!! $errors->first('key', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>

    </div>
    <div class="box-footer mt20" style="text-align:center;">
    <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
    </div>
</div>