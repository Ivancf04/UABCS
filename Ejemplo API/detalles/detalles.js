const headOpciones = {headers: {
    'x-api-key': 'live_jyKpWGp9IaMAS1TlSBHg8jUDUdc2nrVpLkHqZWTed2fHr66Vvo5Q3dCoxxSpjZip'
}};

let noPagina = 1;
const limite = 1;


async function cargarBreeds(pagina) {
    const breeds = await conseguirBreeds(pagina,limite);
    mostrarBreeds(breeds);
}

async function conseguirBreeds(pagina, limite) {
    const apiURL = `https://api.thecatapi.com/v1/breeds`;
    try{
        const response = await fetch(`${apiURL}?limit=${limite}&page=${pagina - 1}`, headOpciones);
        const breeds = await response.json;

        if(!response.ok){
            throw new Error('Error: ' + response.status);
        }

        return await response.json();
    }
    catch(error){
        console.error(error);
    }
}


const catGrid = document.getElementById('catGrid');

function mostrarBreeds(breeds){
    document.getElementById('name').textContent = breeds[0]?.name || 'Nombre no encontrado';
    document.getElementById('imagen').src = breeds[0].image?.url || 'https://via.placeholder.com/300';
    document.getElementById('temp').textContent = breeds[0]?.temperament || 'No disponible';
    document.getElementById('años').textContent = breeds[0]?.life_span || 'No disponible';
    document.getElementById('desc').textContent = breeds[0]?.description || 'No disponible';
    document.getElementById('niños').textContent = breeds[0]?.child_friendly || 'No disponible';
    document.getElementById('perros').textContent = breeds[0]?.dog_friendly || 'No disponible';
    document.getElementById('ori').textContent = breeds[0]?.origin || 'No disponible';
    document.getElementById('wiki').textContent = breeds[0]?.wikipedia_url || '#';
    document.getElementById('wiki').href = breeds[0]?.wikipedia_url || '#';
};

window.addEventListener('DOMContentLoaded', () => cargarBreeds(noPagina));