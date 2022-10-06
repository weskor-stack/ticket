$(document).ready(function(){
    $('#proyecto_cb').on('change', function(){
        
    if((document.getElementById('tiene_garantia')).value != "undefined" || (document.getElementById('tiene_garantia')).value != "undefined"){
        
        (document.getElementById('div_de_garantia')).setAttribute("hidden","True");
    }
    else{
        
        (document.getElementById('div_de_garantia')).removeAttribute("hidden","True");
    }
});});



