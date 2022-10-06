          //$('.select2').select2();
          alert("hola");
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


          alert("gola");