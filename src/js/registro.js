import Swal from "sweetalert2";
(function(){
    let eventos = [];
    
    const eventosResumen = document.querySelector('#registro-resumen')
    if(eventosResumen){

        const eventosBoton = document.querySelectorAll('.evento__agregar');
        eventosBoton.forEach( boton => boton.addEventListener('click', seleccionarEvento));

        const formularioRegistro = document.querySelector('#registro')
        formularioRegistro.addEventListener('submit', submitFormulario)

        mostrarEventos();

        function seleccionarEvento(e){

            if(eventos.length < 5 ){

                eventos = [...eventos, {
                    id: e.target.dataset.id,
                    titulo: e.target.parentElement.querySelector('.evento__nombre').textContent.trim()
                }]

                //Deshabilitar el evento
                e.target.disabled = true;

                mostrarEventos();
            } else {
            
                Swal.fire({
                    title: "Error",
                    text: "Maximo 5 Eventos",
                    icon: "error",
                    confirmButtonText: 'Ok'
                });
            }
            
        
        }

        function mostrarEventos(){

            //Limpiar HTML
            limpiarEventos();

            if(eventos.length > 0){
                eventos.forEach( evento => {
                    const eventoDOM = document.createElement('DIV');
                    eventoDOM.classList.add('registro__evento')

                    const titulo = document.createElement('H3');
                    titulo.classList.add('registro__nombre');
                    titulo.textContent = evento.titulo;

                    const botonEliminar = document.createElement('BUTTON');
                    botonEliminar.classList.add('registro__eliminar');
                    botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`;
                    botonEliminar.onclick = function(){
                        eliminarEvento(evento.id);
                    }

                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(botonEliminar);
                    eventosResumen.appendChild(eventoDOM);
                })
            } else{

                const noRegistro = document.createElement('P');
                noRegistro.textContent = 'No hay eventos, agrega hasta 5 eventos';
                noRegistro.classList.add('registro__texto');
                eventosResumen.appendChild(noRegistro);
            }

        }

        function limpiarEventos(){
            while(eventosResumen.firstChild){
                eventosResumen.removeChild(eventosResumen.firstChild);
            }
        }

        function eliminarEvento(id){
            eventos = eventos.filter(evento => evento.id !== id);
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            mostrarEventos();
        }

        async function submitFormulario(e){
            e.preventDefault();

            //Obtener el regalo
            const regaloId = document.querySelector('#regalo').value

            const eventosId = eventos.map(evento => evento.id);

            if(eventosId.length === 0 || regaloId.length === 0){
                Swal.fire({
                    title: "Error",
                    text: "Debes seleccionar al menos un evento y un regalo",
                    icon: "error",
                    confirmButtonText: 'Ok'
                });
                return;
            }

            const datos = new FormData();
            datos.append('eventos', eventosId);
            datos.append('regalo', regaloId);

            const url = '/finalizar-registro/conferencias';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const resultado = await respuesta.json();

            if(resultado.resultado){
                Swal.fire({
                    title: "Registro Exitoso",
                    text: "Tus conferencias se han almacenado y tu registro fue exitoso. Te esperamos en WebDevCamp",
                    icon: "success",
                    confirmButtonText: 'Ok'
                }).then( () => location.href = `/boleto?id=${resultado.token}`);
            } else{
                Swal.fire({
                    title: "Error",
                    text: "Hubo un error",
                    icon: "error",
                    confirmButtonText: 'Ok'
                }).then( () => location.reload());
            }

        }
    }

})();