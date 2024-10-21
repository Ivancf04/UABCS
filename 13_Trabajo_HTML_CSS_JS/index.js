function operacion(valor){
    document.getElementById('resultado').innerText = eval(valor);
}

const botones = document.querySelectorAll('.boton');

botones.forEach(boton => {
    boton.addEventListener('click', function(){
        switch(boton.textContent){
            case 'C':
                document.getElementById('resultado').innerText = '0';
                break;

            case '=':
                const valor = document.getElementById('resultado').innerText
                operacion(valor);
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