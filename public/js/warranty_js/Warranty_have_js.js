

$(document).ready(function(){
   
   $('#proyecto_cb').on('change', function(){
       
if((document.getElementById('tiene_garantia').value).trim() != "NoWarranty"){
      //oculta el div
   document.getElementById('div_garantia_no_tiene').setAttribute("hidden","True");
   document.getElementById('div_garantia_tiene').removeAttribute("hidden","True");
   


}else{
      //enseña el div cuando func

   document.getElementById('div_garantia_no_tiene').removeAttribute("hidden","True");
   document.getElementById('div_garantia_tiene').setAttribute("hidden","True");
}

});
});
   
