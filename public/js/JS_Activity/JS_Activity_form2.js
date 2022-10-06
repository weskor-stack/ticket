var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
$('#clear').click(function(e) {
    e.preventDefault();
    sig.signature('clear');
    $("#signature").val('');
});