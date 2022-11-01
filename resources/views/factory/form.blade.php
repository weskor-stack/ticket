<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label( __('key')) }}
            {{ Form::text('key', $factory->key, ['class' => 'form-control' . ($errors->has('key') ? ' is-invalid' : ''), 'placeholder' =>  __('key'), 'maxlength' => 7, 'minlength'=>7,'required']) }}
            {!! $errors->first('key', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label( __('Name')) }}
            {{ Form::text('name', $factory->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' =>  __('Name'), 'maxlength' => 50, 'style'=>'text-transform:uppercase;', 'required']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label(__('Address')) }}
            {{ Form::text('address', $factory->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => __('Address'), 'maxlength' => 100,'style'=>'text-transform:uppercase;', 'required']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('customer_id') }}
            <input type="text" name="customer_factory" id="customer_factory">
        </div>
        <div class="form-group" hidden>
            {{ Form::label('contact_id') }}
            <input type="text" name="contact_factory" id="contact_factory">
        </div>

        <br>
    </div>
    <div class="box-footer mt20">
    <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
    </div>
</div>