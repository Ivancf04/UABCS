function agregar(texto){
    const aviso = document.getElementById('aviso');
    if(texto != ''){
        if(aviso){
            const cont_inp = document.getElementById('cont_inp');
            cont_inp.removeChild(aviso);
        }

        const cont_tareas = document.getElementById('cont_tareas');
        const nueva_tarea = document.createElement('li');
        nueva_tarea.class = 'tarea';

        const check = document.createElement('input')
        check.type = 'checkbox';

        const texto_tar = document.createElement('p');
        texto_tar.textContent = texto;
        texto_tar.class = 'tex_tareas';

        const boton_eliminar = document.createElement('button');
        boton_eliminar.textContent = 'Eliminar';

        nueva_tarea.appendChild(check);
        nueva_tarea.appendChild(texto);
        nueva_tarea.appendChild(boton_eliminar);

        cont_tareas.appendChild(nueva_tarea);
        

    }
    else if(!aviso){
        const aviso = document.createElement('p');
        aviso.id = 'aviso';
        aviso.textContent = 'No se ingreso texto';
        const cont_inp = document.getElementById('cont_inp');
        cont_inp.appendChild(aviso);
        aviso.style.color = 'red';
    }

}

const botones = document.querySelectorAll(".boton");

botones.forEach(boton =>{
    boton.addEventListener('click', function(){
        switch(boton.textContent){
            case 'Agregar':
                const texto = document.getElementById('input').value;
                agregar(texto);
                break;
            case 'Eliminar':
                break;
            default:
                alert('Boton sin funcion');
        }
    });
});