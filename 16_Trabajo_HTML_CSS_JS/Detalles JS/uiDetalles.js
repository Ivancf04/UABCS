const catGrid = document.getElementById('catGrid');

export function mostrarBreeds(breeds){
    document.getElementById('name').textContent = breeds[0]?.name || 'Nombre no encontrado';
    document.getElementById('imagen').src = breeds[0].image?.url || 'https://via.placeholder.com/300';
    document.getElementById('imagen').alt = breeds[0].image?.alt || 'gato';
    document.getElementById('temp').textContent = breeds[0]?.temperament || 'No disponible';
    document.getElementById('años').textContent = breeds[0]?.life_span || 'No disponible';
    document.getElementById('desc').textContent = breeds[0]?.description || 'No disponible';
    document.getElementById('niños').textContent = breeds[0]?.child_friendly || 'No disponible';
    document.getElementById('perros').textContent = breeds[0]?.dog_friendly || 'No disponible';
    document.getElementById('ori').textContent = breeds[0]?.origin || 'No disponible';
    document.getElementById('wiki').textContent = breeds[0]?.wikipedia_url || '#';
    document.getElementById('wiki').href = breeds[0]?.wikipedia_url || '#';
};