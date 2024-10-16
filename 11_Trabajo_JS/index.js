let valor = "";
const botones = document.querySelectorAll('.boton');

botones.forEach(boton => {
    boton.addEventListener('click', function() {

        if(this.innerText != "C" && this.innerText != "="){
            if(isNaN(this.innerText)){
                if(this.innerText != document.getElementById('pantalla').innerText.charAt(document.getElementById('pantalla').innerText.length - 1)){
                    valor += this.innerText;
                    document.getElementById('pantalla').innerText = valor;
                }
                else{
                    alert('no se puede agregar seguido este valor');
                }
            }

            if(this.innerText == "="){
                let cadena = "";
                let valor2 = "";

                cadena = document.getElementById('pantalla').innerText;

                for(i=0; i < cadena.length;i++){
                    if(isNaN(cadena.charAt(i))){
                        for(j=i;j < cadena.length;j++){
                            valor2 += cadena.charAt(i);
                        }
                        switch(cadena.charAt(i)){
                            case '+':
                                cadena = parseFloat(valor) + parseFloat(valor2);
                                break;

                            case '-':
                                cadena = parseFloat(valor) - parseFloat(valor2);
                                break;
                            case 'x':
                                cadena = parseFloat(valor) * parseFloat(valor2);
                                break;
                            case '/':
                                cadena = parseFloat(valor) / parseFloat(valor2);
                                break;

                        } 
                        document.getElementById('pantalla').innerText = cadena;
                        break;
                    }
                    else{
                        valor += cadena.charAt(i);
                    }
                }
            }

            else{
                valor += this.innerText;
                document.getElementById('pantalla').innerText = valor;
            }
        }
        
        else{
            valor = "";
            document.getElementById('pantalla').innerText = '0';
        }
        
    });
});
