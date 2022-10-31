<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group" >
            {{ Form::label( __('Key')) }}
            {{ Form::text('key', $customer->key, ['class' => 'form-control  ' . ($errors->has('key') ? ' is-invalid' : ''), 'id' => 'key', 'placeholder' => __('Key'), 'maxlength' => 5, 'minlength'=>5, 'required']) }}
            <!--<input type="text" name="customer_id" id="customer_id" class="form-control" maxlength="10" minlength="10" placeholder="{{ __('customer_id') }}" required>-->
            {!! $errors->first('key', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label( __('Name')) }}
            {{ Form::text('name', $customer->name, ['class' => 'form-control  ' . ($errors->has('name') ? ' is-invalid' : ''),'id' => 'name', 'placeholder' => __('Name'), 'maxlength' => 50, 'style'=>'text-transform:uppercase;', 'required']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label(__('address')) }}
            {{ Form::text('address', $customer->address, ['class' => 'form-control  ' . ($errors->has('address') ? ' is-invalid' : ''),'id' => 'address', 'placeholder' => __('address'), 'maxlength' => 100,'style'=>'text-transform:uppercase;','required']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            <b><span id="emailOK"></span></b>
            <!-- {{ Form::text('email', $customer->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email', 'maxlength' => 50, 'pattern'=>'/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i','required']) }} -->
            <input type="email" id="email" name="email" class="form-control" pattern='[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}' title="Entre un email válido"  placeholder="Email" style="text-transform:lowercase;" required>
            
            <!-- {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!} -->

             <script src="{{ asset('js/JS_Customer/JS_Customer_email.js') }}"></script> 
 
        </div>
        <div class="form-group">
            {{ Form::label( __('phone')) }} <br>
            <!--<input type="tel" class="form-control" name="phone" id="phone" placeholde="{{ __('123-456-78-90')}}" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" require>
            {{ Form::text('phone', $customer->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => __('123-456-78-90'),'maxlength' => 13, 'pattern'=>'[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}', 'required']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}-->

            <input class="form-control  " <?php echo($errors->has('phone') ? ' is-invalid' : ''); ?> id="phone" type="tel" name="phone" pattern="^\(\s+)?\(?(17|25|29|33|44)\)?(\s+)?[0-9]{3}-?[0-9]{3}-?[0-9]{2}$" required> <br>

            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}

            <script src="{{ asset('js/JS_Customer/JS_Customer.js') }}"></script>
        </div>
               
       <br>

    </div>
    <div class="box-footer mt20" style="text-align:center;">
        <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('tickets.create') }}"> {{ __('Cancel')}}</a>-->
    </div>
</div>