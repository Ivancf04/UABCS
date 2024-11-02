import { conseguirBreeds } from "./api.js";
import { mostrarBreeds, actualizarBotones } from "./ui.js";

let suma = 0;

//Seccion del manejo de los breeds o los gatitos

let noPagina = 1;
const limite = 12;

async function cargarBreeds() {
    const breeds = await conseguirBreeds(noPagina,limite);
    mostrarBreeds(breeds, suma);
    actualizarBotones(noPagina, breeds.length, limite);
}
//Seccion del manejo de los botones
const botIzq = document.getElementById('siguiente');
botIzq.addEventListener('click', ()=>{
    if(botIzq.disabled != true){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        })
        suma += limite;
        noPagina++;
        cargarBreeds(noPagina);
    }
    else{
        console.log('No hay mas elementos al navegar hacia adelante');
    }
});

const botDer = document.getElementById('atras');
botDer.addEventListener('click', ()=>{
    if(noPagina > 1){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        })
        suma -= limite;
        noPagina--;
        cargarBreeds();
    }
    else{
        console.log('No hay mas elementos al navegar hacia atras');
    }
});

window.addEventListener('DOMContentLoaded', () => cargarBreeds());