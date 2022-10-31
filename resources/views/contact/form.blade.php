<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label( __('Job Title')) }}

            <select class="form-select" id="job_title" name="job_title" requiered>
                <option value="Ing.">Ingeniero.</option>
                <option value="Lic.">Licenciado.</option>
                <!-- <option value="2">2 hrs.</option>
                <option value="3">3 hrs.</option>
                <option value="4">4 hrs.</option>
                <option value="5">5 hrs.</option> -->
            </select>
            {{ Form::label( __('Name')) }}
            {{ Form::text('name', $contact->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('Name'), 'style'=>'text-transform:uppercase;', 'required']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            
            
        </div>

        <div class="form-group">
            {{ Form::label( __('Last name')) }}
            {{ Form::text('last_name', $contact->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => __('Last name'),'style'=>'text-transform:uppercase;','required']) }}
            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label( __('Second last name')) }}
            {{ Form::text('second_last_name', $contact->second_last_name, ['class' => 'form-control' . ($errors->has('second_last_name') ? ' is-invalid' : ''), 'placeholder' => __('Second last name'),'style'=>'text-transform:uppercase;','required']) }}
            {!! $errors->first('second_last_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('E-mail') }}
            <b><span id="emailOK2"></span></b>
            <!-- {{ Form::text('email', $contact->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email', 'maxlength' => 50,'required']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!} -->

            <input type="email" id="email2" name="email" class="form-control" pattern='[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}' title="Entre un email válido"  placeholder="Email" style="text-transform:lowercase;" required>

            <script src="{{ asset('js/JS_Contact/JS_Contact_email.js') }}"></script> 
         
        </div>
        <div class="form-group">
            {{ Form::label( __('phone')) }}
            <!--{{ Form::text('phone', $contact->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''),  'placeholder' => __('123-456-78-90'),'maxlength' => 13, 'pattern'=>'[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}', 'required']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}-->

            <input class="form-control" id="phone2" type="tel" name="phone" placeholder="(___) ___-__-__" pattern="^\(\s+)?\(?(17|25|29|33|44)\)?(\s+)?[0-9]{3}-?[0-9]{3}-?[0-9]{2}$" required>

            <script src="{{ asset('js/JS_Contact/JS_Contact.js') }}"></script>

        </div>
        <br>
        <div class="form-group" hidden>
            
            {{ Form::label( __('Customer')) }} <br>
            <!--{{ Form::select('customer_id', $customers, $contact->customer_id, ['class' => 'form-select' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => __('Customer')]) }}
            {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}-->
            <!--{{ Form::text('customer_id', $contact->customer_id, ['class' => 'form-control' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => __('Customer'), 'require']) }}
            {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
            <input type="text" name="customer_id2" id="customer_id" value="{{$customers}}"/>-->
            <input type="text" name="ejemplo" id="ejemplo" value="" hidden/>

            
        </div>
        <br>
        <div class="form-group" hidden>
            {{ Form::label( __('Status')) }} <br>
            {{ Form::text('status_id', "1", ['class' => 'form-select' . ($errors->has('status_id') ? ' is-invalid' : ''), 'placeholder' => __('Status')]) }}
            {!! $errors->first('status_id', '<div class="invalid-feedback">:message</div>') !!}
            
        </div>
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 9999) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20" style="text-align:center;">
        <button type="submit" id="boton1" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('tickets.create') }}"> {{ __('Cancel')}}</a>-->
    </div>
</div>