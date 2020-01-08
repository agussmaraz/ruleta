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
    var node = clickeado.parentNode
    parentNode = node.parentNode
    parentNode.remove()
}