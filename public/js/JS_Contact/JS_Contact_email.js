document.getElementById('email2').addEventListener('input', function() {
    
    campo = event.target;
    valido = document.getElementById('emailOK2');
        
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
    valido.innerText = "válido";
    valido.style.color = 'green';
    } else {
    valido.innerText = "incorrecto";
    valido.style.color = 'red';
    }
});