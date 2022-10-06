$('.select2').select2({
    dropdownParent: $('#dialogo1 .modal-body')
});


var value_input;
$('select').on('change', function() {
    var data = this.value;
    /*document.getElementById("text1").value = data;
    const contenido = document.getElementById("text1").value;
    //alert(contenido);*/
    var countryId = $(this).find(':selected').data('stock');
    var unity = $(this).find(':selected').data('unity');
    $("#text1").val(data);
    $("#text2").val(unity);
    document.getElementById("text1").value = countryId;
    document.getElementById("text2").value = unity;
    //alert( "{{ __('unit_measure')}}: " + unity + "\n" + "{{ __('Stock')}}: " + countryId );
    
    //alert(quantity);
});

/*$('#message').on("keyup", function(){
    var x = $('#message').val();
    var y = document.getElementById("text1").value;
    if (x>y) {
        alert("No hay suficiente material");
    }
});
/*function elementoCantidad(elemento){

    alert("s");

}*/



$(document).ready(function() {
    $('#dialogo1').on('show.bs.modal', function() {
        $('#select2-sample').select2();
    })
});



var value_input;
$('#tool_id').on('change', function() {
    var data = this.value;
    document.getElementById("text1").value = data;
    const contenido = document.getElementById("text1").value;
    //alert(contenido);*/
    var countryId = $(this).find(':selected').data('stock');
    var unity = $(this).find(':selected').data('unity');
    $("#text3").val(data);
    $("#text4").val(unity);
    document.getElementById("text3").value = countryId;
    document.getElementById("text4").value = unity;
    //alert( "{{ __('unit_measure')}}: " + unity + "\n" + "{{ __('Stock')}}: " + countryId );
});

$('#tool_id').select2({
    dropdownParent: $('#dialogo2 .modal-body')
});



$('#employee_id').select2({
    dropdownParent: $('#dialogo3 .modal-body')
});