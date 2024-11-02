const catGrid = document.getElementById('catGrid');

export function mostrarBreeds(breeds, suma){
    catGrid.innerHTML = '';
    let idGatos = 0;
    breeds.forEach(breed => {
        const catCard = document.createElement('div');
        catCard.classList.add('catCard');
        catCard.innerHTML = `
            <h3>${breed?.name || 'Nombre no disponible'}</h3>
            <img src="${breed.image?.url || 'https://via.placeholder.com/300'}" alt="${breed.name}">
            <p>The cat is ${breed?.temperament || 'Temperamento no disponible'}.</p>
            <p>And it is from ${breed?.origin || 'Origen no disponible'}.</p>
            <p class = "ids">${idGatos}</p>
            `;
        catCard.addEventListener('click', ()=>{
            const id = parseInt(catCard.querySelector('.ids').textContent);
            const gato = (id + suma);
            window.location.href =`./detalles.html?noPag=${gato}`;
        })
        idGatos++;
        catGrid.appendChild(catCard);
    });
}

export function actualizarBotones(noPagina, breedCount, limite){
    document.getElementById('atras').disabled = noPagina === 1;
    document.getElementById('siguiente').disabled = breedCount < limite;
}