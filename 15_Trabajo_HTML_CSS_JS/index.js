
//Seccion del manejo de los botones

function actualizarBotones(currentPage, breedCount, limit){
    document.getElementById('atras').disabled = currentPage === 1;
    document.getElementById('siguiente').disabled = breedCount < limit;
}

document.getElementById('siguiente').addEventListener('click', ()=>{
    if(this.disabled != true){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        })
        noPagina++;
        cargarBreeds(noPagina);
    }
    else{
        console.log('No hay mas elementos al navegar hacia adelante');
    }
});

document.getElementById('atras').addEventListener('click', ()=>{
    if(noPagina > 1){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        })
        noPagina--;
        cargarBreeds(noPagina);
    }
    else{
        console.log('No hay mas elementos al navegar hacia atras');
    }
});



//Seccion del manejo de los breeds o los gatitos



const headOpciones = {headers: {
    'x-api-key': 'live_jyKpWGp9IaMAS1TlSBHg8jUDUdc2nrVpLkHqZWTed2fHr66Vvo5Q3dCoxxSpjZip'
}}

let noPagina = 1;
const limite = 12;


async function cargarBreeds(pagina) {
    const breeds = await conseguirBreeds(pagina,limite);
    mostrarBreeds(breeds);
    actualizarBotones(noPagina, breeds.length, limite);
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
    catGrid.innerHTML = '';
    breeds.forEach(breed => {
        const catCard = document.createElement('div');
        catCard.classList.add('catCard');
        catCard.innerHTML = `
            <h3>${breed?.name || 'Nombre no disponible'}</h3>
            <img src="${breed.image?.url || 'https://via.placeholder.com/300'}" alt="${breed.name}">
            <p>The cat is ${breed?.temperament || 'Temperamento no disponible'}.</p>
            <p>And it is from ${breed?.origin || 'Origen no disponible'}.</p>
            `;
        catCard.addEventListener('click', ()=>{
            window.location.href ="./detalles/detalles.html";
        })
        catGrid.appendChild(catCard);
    });
}

window.addEventListener('DOMContentLoaded', () => cargarBreeds(noPagina));