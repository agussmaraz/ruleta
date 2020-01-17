let cuerpo = document.body;
let icono = cuerpo.querySelectorAll('.eliminar');
// console.log(icono);

icono.forEach(element => element.addEventListener('click', function (evento) {
    eliminar(this.id, evento);
}));
function eliminar(id, evento) {
    Swal.fire({
        title: 'Seguro que quieres eliminarlo?',
        text: "Recuerda que no lo puedes revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminalo'
    })
        .then((result) => {
            if (result.value) {
                fetch('http://localhost:8000/cuenta/' + id)
                    .then(function (resp) {
                        return resp.json();
                    })
                    .then(function (data) {
                        // console.log(data);
                        eliminarDato(data, evento)
                        Swal.fire(
                            'Eliminado!',
                            'Ha sido eliminado con exito',
                            'success'
                        )
                    })

            }
        })
}
function eliminarDato(data, evento) {
    var clickeado = evento.target;
    var padre = clickeado.closest('.eliminar');
    console.log(padre);
    var renglon = padre.closest('.linea');
    console.log(renglon);
    renglon.remove();
}

let icono2 = cuerpo.querySelectorAll('.eliminarUser');
// console.log(icono);

icono2.forEach(element => element.addEventListener('click', function (evento) {
    eliminarUser(this.id, evento);
}));
function eliminarUser(id, evento) {
    Swal.fire({
        title: 'Seguro que quieres eliminarlo?',
        text: "Recuerda que no lo puedes revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminalo'
    })
        .then((result) => {
            if (result.value) {
                fetch('http://localhost:8000/admin/cuentas/' + id)
                    .then(function (resp) {
                        return resp.json();
                    })
                    .then(function (data) {
                        // console.log(data);
                        eliminarDato2(data, evento)
                        Swal.fire(
                            'Eliminado!',
                            'Ha sido eliminado con exito',
                            'success'
                        )
                    })

            }
        })
}
function eliminarDato2(data, evento) {
    var clickeado = evento.target;
    // console.log(clickeado);
    var node = clickeado.parentNode
    // console.log(node);
    parentNode = node.parentNode
    padre = parentNode.parentNode;
    // console.log(padre);
    padre.remove()
}