<div class="modal fade" id="purchase_edit" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- cabecera del diálogo -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Update purchase')}}</h4>
                        <img src="{{ asset('images/icons/add2.png') }}" width="8%">
                    </div>

                <!-- cuerpo del diálogo -->
                    <div class="modal-body">
                        <div class="card-body">

                        
                        
                        @if($orderPurchases->isEmpty()){
                            {{$orderPurchases}}
                        }
                        @else
                            <!-- {{$orderPurchases[0]['purchase_id']}} -->

                            <form method="POST" action="{{ route('order-purchases.update', $orderPurchases[0]['purchase_id']) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf

                                <div class="box box-info padding-1">
                                    <div class="box-body">
                                        
                                        
                                        
                                        <div class="form-group">
                                            {{ Form::label(__('Key')) }}
                                            {{ Form::text('key', $orderPurchases[0]->key, ['class' => 'form-control' . ($errors->has('key') ? ' is-invalid' : ''), 'placeholder' => __('Key'), 'maxlength' => 10, 'minlength'=>5,'required']) }}
                                            {!! $errors->first('key', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <br>

                                    </div>
                                    <div class="box-footer mt20" style="text-align:center;">
                                    <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Update')}}</button>
                                    </div>
                                </div>
                            </form>
                        
                        @endif
                        </div>                                                            
                    </div>

                <!-- pie del diálogo -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons" style="font-size:20px">block</i>&nbsp;{{ __('Cancel')}}</button>
                    </div>
            </div>
        </div>
                                                        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>