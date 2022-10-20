<div class="modal fade" id="purchase_index" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- cabecera del diálogo -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('View purchase')}}</h4>
                        <img src="{{ asset('images/icons/show.png') }}" width="8%">
                    </div>

                <!-- cuerpo del diálogo -->
                    <div class="modal-body">
                        <div class="card-body">
                        <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										
										<th>{{ __('Key') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderPurchases as $orderPurchase)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $orderPurchase->key }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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