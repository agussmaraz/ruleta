let aprobar = document.querySelectorAll('.aprobarComida')
// console.log(aprobar);
aprobar.forEach(element => element.addEventListener('click', function (evento) {
    aprobarComidas(this.id, evento);
}));

function aprobarComidas(id, evento) {
    Swal.fire({
        title: 'Quieres aprobarlo?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, aprobar'
    })
        .then((result) => {
            if (result.value) {
                fetch('http://localhost:8000/admin/comidas/' + id)
                    .then(function (resp) {
                        // console.log(resp);
                        return resp.json();
                    })
                    .then(function (data) {
                        aprobarDato(data, evento)
                        Swal.fire(
                            'Aprobado!',
                            'Estara disponible para otros usuarios',
                            'success'
                        )
                    })

            }
        })
}
function aprobarDato(data, evento) {
    var clickeado = evento.target;
    // console.log(evento);
    var padre = clickeado.closest('.aprobarComida');
    console.log(padre)
    var renglon = padre.closest('.linea');
    console.log(renglon);
    var dato = renglon.querySelector('.dato');
    console.log(dato);
    // console.log(data.estado);
    dato.innerHTML = 'Aprobado';
}



let rechazar = document.querySelectorAll('.rechazar');
// console.log(rechazar);
rechazar.forEach(element => element.addEventListener('click', function (evento) {
    rechazarComida(this.id, evento);
}));
function rechazarComida(id, evento) {
    Swal.fire({
        title: 'Seguro que quieres rechazarlo?',
        text: "No puedes revertirlo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, rechazar'
    })
        .then((result) => {
            if (result.value) {
                fetch('http://localhost:8000/admin/rechazar/' + id)
                    .then(function (resp) {
                        console.log(resp);
                        return resp.json();
                    })
                    .then(function (data) {
                        rechazarDato(data, evento)
                        Swal.fire(
                            'Rechazado',
                            'Se le comunicara al usuario',
                            'success'
                        )
                    })

            }
        })
}
function rechazarDato(data, evento) {
    let clickeado = evento.target;
    console.log(clickeado);
    var padre = clickeado.closest('.rechazar');
    console.log(padre)
    var renglon = padre.closest('.linea');
    console.log(renglon);
    var dato = renglon.querySelector('.dato');
    console.log(dato);
    // console.log(data.estado);
    dato.innerHTML = 'Rechazado';
}

let permiso = document.querySelector('#nombreAdmin');
// console.log(permiso);
if (permiso) {

    permiso.addEventListener('click', function () {
        advertencia();
    });
};
function advertencia() {
    Swal.fire({
        icon: 'warning',
        title: 'Advertencia',
        text: 'Recuerda que al crear un nuevo administrador le estas dando los mismos permisos que tienes tú.',
        footer: '<a href="/"> Volver atras </a>'
    })
}










