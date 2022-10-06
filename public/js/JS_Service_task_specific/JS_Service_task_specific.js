var sig = $('#sig').signature({syncField: '#signature_evidence', syncFormat: 'PNG'});
                $('#clear').click(function(e) {
                    e.preventDefault();
                    sig.signature('clear');
                    $("#signature_evidence").val('');
                });