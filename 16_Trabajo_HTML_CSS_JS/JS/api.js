const headOpciones = {headers: {
    'x-api-key': 'live_jyKpWGp9IaMAS1TlSBHg8jUDUdc2nrVpLkHqZWTed2fHr66Vvo5Q3dCoxxSpjZip'
}}

export async function conseguirBreeds(pagina, limite) {
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