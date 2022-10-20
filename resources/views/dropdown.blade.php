<!DOCTYPE html>
<html>
<head>
    <title>Dependent dropdown example</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>
<body>
    <div>
        
        <div>
            {{ Form::label( __('Customer')) }} <br>
            <select class="form-select " id="customer">
                <option selected disabled>{{ __('Select customer')}}</option>
                @foreach ($countries as $country)
                <option value="{{ $country->customer_id }}">{{ $country->name }}</option>
                @endforeach
            </select>

            Texto seleccionado:<input type="text" id="customer_id" name="text1"><br>
        </div>
        <br>
        <div>
            {{ Form::label( __('Contact')) }} <br>
            Texto seleccionado:<input type="text" id="contact_id" name="text1"><br>
            <select class="form-select " id="contact"></select>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#customer').on('change', function () {
                var countryId = $(this).val();
                //document.getElementById('customer_id').value= countryId;
                $('#contact').html('');
                $.ajax({
                    url: "{{ route('getStates') }}?customer_id="+countryId,
                    type: 'get',
                    success: function (res) {
                        $('#contact').html("<option value=''>{{ __('Select contact')}}</option>");
                        $.each(res, function (key, value) {
                            $('#contact').append('<option value="' + value
                                .contact_id + '">' + value.name + ' ' + value.last_name +'</option>');
                        });
                    }
                });
            });

            $('#contact').on('change', function () {
                var contactId = this.value;
                document.getElementById('contact_id').value= contactId;
                
            });
        });
    </script>

    <div>
        {{ Form::label( __('Factories')) }} <br>
        Texto seleccionado:<input type="text" id="factory_id" name="factory"><br>
        <select class="form-select " id="factory"></select>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#customer').on('change', function () {
                var countryId = $(this).val();
                //document.getElementById('customer_id').value= countryId;
                $('#factory').html('');
                $.ajax({
                    url: "{{ route('getFactories') }}?customer_id="+countryId,
                    type: 'get',
                    success: function (res) {
                        $('#factory').html("<option value=''>{{ __('Select factory')}}</option>");
                        $.each(res, function (key, value) {
                            $('#factory').append('<option value="' + value
                                .factory_id + '">' + value.factory_id + ' ' + value.name +'</option>');
                        });
                    }
                });
            });

            $('#factory').on('change', function () {
                var contactId = this.value;
                document.getElementById('factory_id').value= contactId;
                
            });
        });
    </script>
</body>
</html>