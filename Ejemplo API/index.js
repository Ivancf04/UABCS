const apiURL = "https://api.thecatapi.com/v1/breeds";
    const catGrid = document.getElementById('dogGrid');
    const currentPage = 1;
    const limit = 10;
    
    async function getBreeds(page) {
        try{
            const response = await fetch('${apiURL}?limit=$(limit)&page=$(currentPage)');
            const breeds = await response.json;
        }
        catch(error){
            console.error(error);
        }
    }
    function showBreeds(razas){

    }