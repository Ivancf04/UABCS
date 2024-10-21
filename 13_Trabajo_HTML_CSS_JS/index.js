function operacion(valor){
    
    if(!isNaN(parseFloat(valor)) && eval(valor) != "Infinity"){
        const historial = document.getElementById("historial");
        const historialTexto = document.getElementById("historial_texto");

        if(historialTexto){
        historial.removeChild(historialTexto);
        }
        const nuevoElemento = document.createElement('p');
        nuevoElemento.textContent = valor + ': ' + eval(valor);

        historial.appendChild(nuevoElemento);

        document.getElementById('resultado').innerText = eval(valor);
    }
    else if(eval(valor) == "Infinity"){
        alert("Valor infinito, no dividas entre 0")
        document.getElementById('resultado').innerText = '0';
    }
    else{
        alert("Operacion invalida");
        document.getElementById('resultado').innerText = '0';
    }
    
}

const botones = document.querySelectorAll('.boton');

botones.forEach(boton => {
    boton.addEventListener('click', function(){
        switch(boton.textContent){
            case 'C':
                document.getElementById('resultado').innerText = '0';
                break;

            case '=':
                const valor = document.getElementById('resultado').innerText;
                if(valor !== '0'){
                    operacion(valor);
                }
                else{
                    alert('ingresa al menos una operacion');
                }
                
                break;

            default:
                if(document.getElementById('resultado').innerText == '0'){
                    document.getElementById('resultado').innerText = '';
                }
                document.getElementById('resultado').innerText += this.textContent;
                break;
        }
        
    });
});