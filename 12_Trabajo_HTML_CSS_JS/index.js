function cambiarColorFondo(color, restablecer) {
    document.body.style.backgroundColor = color;
    document.getElementById('contenedor').style.backgroundColor = color;

    if(!restablecer){
        document.getElementById('h1').style.color = 'white';
        document.getElementById('h2').style.color = 'white';
    }

    else{
        document.getElementById('h1').style.color = 'black';
        document.getElementById('h2').style.color = 'black';
    }
    
}

const botones = document.querySelectorAll('.boton');

botones.forEach(boton => {
    boton.addEventListener('click', function() {
        switch(this.id){
            case 'rojo':
                cambiarColorFondo('red', false);
                break;

            case 'verde':
                cambiarColorFondo('green', false);
                break;

            case 'azul':
                cambiarColorFondo('blue', false);
                break;

            case 'restablecer':
                cambiarColorFondo('white', true);
                break;

            default:
                break;

        }

    });
});