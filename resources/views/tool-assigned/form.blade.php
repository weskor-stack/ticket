<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

            <strong>{{ Form::label( __('Key')) }}</strong>
            <!--{{ Form::select('tool_id', $tool, $toolAssigned->tool_id, ['class' => 'form-select' . ($errors->has('tool_id') ? ' is-invalid' : ''), 'placeholder' => 'Tool']) }}
            {!! $errors->first('material_id', '<div class="invalid-feedback">:message</div>') !!}-->

            <br>

            <select class="form-select" id="tool_id" name="tool_id" style="width:100%" required>
                <option value="">--{{ __('Select tool')}}--</option>
                @if($materialAssigneds->isEmpty())
                    @foreach ($tools as $item)
                        <option value="{{$item->tool_id}}" data-stock="{{$item->stock}}" data-unity="{{$item->unitMeasure->name}}">{{$item->key}} - {{$item->name}}</option>
                    @endforeach
                @else
                    @foreach ($tool2 as $item)
                        <option value="{{$item->tool_id}}" data-stock="{{$item->stock}}" data-unity="{{$item->unitMeasure->name}}">{{$item->key}} - {{$item->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <br>
        <div class="form-group">
            <strong>{{ Form::label( __('Quantity')) }}</strong>
            {{ Form::number('quantity', $toolAssigned->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => __('Quantity'), 'step'=>'0.1', 'min'=>'0','required']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
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
    <div class="box-footer mt20" style="text-align:center;">
        <button type="submit" class="btn btn-success btn-lg"> <i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{__('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('tool-assigneds.index') }}"> Cancel</a>-->
    </div>
</div>