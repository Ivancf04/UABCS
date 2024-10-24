function agregar(texto){
    const aviso = document.getElementById('aviso');
    if(texto != ''){
        if(aviso){
            const cont_inp = document.getElementById('cont_inp');
            cont_inp.removeChild(aviso);
        }

        const cont_tareas = document.getElementById('lista');
        const nueva_tarea = document.createElement('li');
        nueva_tarea.classList.add('tarea');
        nueva_tarea.style.listStyle = 'none';

        const check = document.createElement('input')
        check.type = 'checkbox';

        const texto_tar = document.createElement('input');
        texto_tar.disabled = true;
        texto_tar.value = texto;
        texto_tar.classList.add('tex_tareas');

        check.addEventListener('change', function(){
            marcar(this);
            guardarTareas();
        });

        const boton_eliminar = document.createElement('button');
        boton_eliminar.textContent = 'Eliminar';
        boton_eliminar.id = 'eliminar';
        boton_eliminar.classList.add('boton');
        boton_eliminar.classList.add('diseño');
        boton_eliminar.addEventListener('click', function(){
            eliminar(this);
            guardarTareas();
        });

        nueva_tarea.appendChild(check);
        nueva_tarea.appendChild(texto_tar);
        nueva_tarea.appendChild(boton_eliminar);

        cont_tareas.appendChild(nueva_tarea);
        
        document.getElementById('input').value = '';
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

function eliminar(boton){
    const tarea = boton.closest('li');

    if (tarea) {
        tarea.remove();
    }
}

function marcar(boton){
    const tarea = boton.closest('li');
    if(tarea){
        const texto = tarea.querySelector('.tex_tareas');
        if(texto){
            texto.classList.toggle('subrayado');
        }
        else{
            console.error('No se encontro el elemento');
        }
        
    }
}

const botones = document.querySelectorAll(".boton");

botones.forEach(boton =>{
    boton.addEventListener('click', function(){
        switch(boton.textContent){
            case 'Agregar':
                const texto = document.getElementById('input').value;
                agregar(texto);
                guardarTareas();
                break;
            default:
                alert('Boton sin funcion');
        }
    });
});


function guardarTareas() {
    const tareas = document.querySelectorAll('.tarea');
    const lista_tareas = [];

    tareas.forEach(tarea => {
        const texto_tar = tarea.querySelector('.tex_tareas').value;
        const marcada = tarea.querySelector('input[type="checkbox"]').checked;
        lista_tareas.push({ texto: texto_tar, marcada: marcada });
    });

    localStorage.setItem('tareas', JSON.stringify(lista_tareas));
}

function cargarTareas() {
    const tareas = localStorage.getItem('tareas');
    if (tareas) {
        JSON.parse(tareas).forEach(t => {
            agregar(t.texto);
            const nueva_tarea = document.querySelector('.tarea:last-child');
            nueva_tarea.querySelector('input[type="checkbox"]').checked = t.marcada;
            if (t.marcada) {
                nueva_tarea.querySelector('.tex_tareas').classList.add('subrayado');
            }
        });
    }
}

window.addEventListener('load', cargarTareas);
