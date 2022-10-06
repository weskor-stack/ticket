$('#time_entry').datetimepicker({
    format: 'HH:mm'
});

$('#time_completion').datetimepicker({
    format: 'HH:mm'
});



var value_input;
$('select').on('change', function() {
    var data = this.value;
    /*document.getElementById("text1").value = data;
    const contenido = document.getElementById("text1").value;
    //alert(contenido);*/
    var countryId = $(this).find(':selected').data('stock');
    var unity = $(this).find(':selected').data('unity');
    $("#text10").val(data);
    $("#text12").val(unity);
    document.getElementById("text10").value = countryId;
    document.getElementById("text12").value = unity;
    //alert( "{{ __('unit_measure')}}: " + unity + "\n" + "{{ __('Stock')}}: " + countryId );                        
    //alert(quantity);
});


var value_input;
$('select').on('change', function() {
    var data = this.value;
    /*document.getElementById("text1").value = data;
    const contenido = document.getElementById("text1").value;
    //alert(contenido);*/
    var countryId = $(this).find(':selected').data('stock');
    var unity = $(this).find(':selected').data('unity');
    $("#text13").val(data);
    $("#text14").val(unity);
    document.getElementById("text13").value = countryId;
    document.getElementById("text14").value = unity;
    //alert( "{{ __('unit_measure')}}: " + unity + "\n" + "{{ __('Stock')}}: " + countryId );                        
    //alert(quantity);
});