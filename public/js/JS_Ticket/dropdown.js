var customer = document.getElementById('customer_id').value;
    $("#customer").on("select2:select", function (e) {
        var countryId = $(this).val();
        customer = document.getElementById('customer_id').value= countryId;
        document.getElementById('ejemplo').value= countryId;
        $('#contact').html('');
        $.ajax({
            url: "{{ route('getStates') }}?customer_id="+customer,
            type: 'get',
            success: function (res) {
                $('#contact').html("<option value=''>{{ __('Select contact')}}</option>");
                $.each(res, function (key, value) {
                    $('#contact').append('<option value="' + value
                    .contact_id + '">' + value.name + ' ' + value.last_name +'</option>');
                });
            }
        });
                    

    $('#contact').on("change", function () {
        var contactId = this.value;
        document.getElementById('contact_id').value= contactId;
                        
    });
});

var customer = document.getElementById('customer_id').value;
    $("#customer").on("select2:select", function (e) {
        var countryId = $(this).val();
        customer = document.getElementById('customer_id').value= countryId;
        document.getElementById('customer_factory').value= countryId;
        $('#factory_id').html('');
            $.ajax({
                url: "{{ route('getFactories') }}?customer_id="+customer,
                type: 'get',
                success: function (res) {
                    $('#factory_id').html("<option value=''>{{ __('Select fatory')}}</option>");
                        $.each(res, function (key, value) {
                            $('#factory_id').append('<option value="' + value
                            .factory_id +'">' + value.name + '</option>');
                    });
                }
            });
                    

        $('#contact').on("change", function () {
            var contactId = this.value;
            // document.getElementById('factory2').value= contactId;
            document.getElementById('contact_factory').value= contactId;
            // alert( document.getElementById('contact_factory').value);
        });
    });

    $('#factory_id').on("change", function () {
        var contactId = this.value;
        const resultado = document.querySelector('.resultado');
        // resultado.textContent = contactId;
        // alert( document.getElementById('contact_factory').value);

        $('.resultado').html('');
        $.ajax({
            url: "{{ route('getAddress') }}?factory_id="+contactId,
            type: 'get',
            success: function (res) {
                // $('.resultado').html("<option value=''>{{ __('Select fatory')}}</option>");
                    $.each(res, function (key, value) {
                        $('.resultado').append(value.address);
                    });
            }
        });
    });