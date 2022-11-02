<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <b>{{ Form::label(__('Factory')) }}:</b>
            
            <select name="factory_id" id="factory_id" class="form-select">
                <!-- <option selected disabled> {{$factories->name}}</option> -->
                @foreach($factory_customer as $factory)
                    @if( $ticketLocation->factory_id == $factory->factory_id)
                        <option selected> {{$factories->name}}</option>
                    @else
                        <option value="{{ $factory->factory_id }}">{{ $factory->name }}</option>
                    @endif
                @endforeach
            </select>
           
        </div>
        <div class="form-group">
            <b>{{ Form::label(__('Site')) }}:</b>
            {{ Form::text('site', $ticketLocation->site, ['class' => 'form-control' . ($errors->has('site') ? ' is-invalid' : ''), 'placeholder' => 'Site']) }}
            {!! $errors->first('site', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <b>{{ Form::label(__('Location')) }}:</b> <br>

            <!-- <input type="radio" name="type_maintenance_id" id="type_maintenance_id" value="L" checked> {{ __('Local') }} <br> -->

            @if ($ticketLocation->location == 'L')
                {{ Form::radio('location','L', true) }}
            @else
                {{ Form::radio('location','L') }}
            @endif
            {{ Form::label( __('Local')) }}<br>

            @if ($ticketLocation->location == 'F')
                {{ Form::radio('location','F', true) }} 
            @else
                {{ Form::radio('location','F') }}
            @endif
                {{ Form::label( __('Foreign')) }}<br>
            
        </div>
        
        <br>

    </div>
    <div class="box-footer mt20" style="text-align:center;">
    <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
    </div>
</div>