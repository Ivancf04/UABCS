import{conseguirBreeds} from "../JS/api.js";
import { mostrarBreeds } from "./uiDetalles.js";

const params = new URLSearchParams(window.location.search);
const noPagina = parseInt(params.get('noPag')) + 1;
const limite = 1;

async function cargarBreeds(pagina) {
    const breeds = await conseguirBreeds(pagina,limite);
    mostrarBreeds(breeds);
}

window.addEventListener('DOMContentLoaded', () => cargarBreeds(noPagina));