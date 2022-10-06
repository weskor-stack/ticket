var value_input;
$('select').on('change', function() {
    var data = this.value;
    var quantity = $(this).find(':selected').data('quantity');
    $("#quantity").val(quantity);
    document.getElementById("quantity").value = quantity;
});          