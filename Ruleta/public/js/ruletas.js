let ruleta = new Winwheel({
    'numSegments': 6,
    'outerRadius': 170,
    'segments': [
        { 'fillStyle': '#9ADDE8', 'text': 'Milanesas' },
        { 'fillStyle': '#9AC5E8', 'text': 'Sopa' },
        { 'fillStyle': '#9AAEE8', 'text': 'Pastel de papa' },
        { 'fillStyle': '#CD9AE8', 'text': 'Pizza' },
        { 'fillStyle': '#E89AC7 ', 'text': 'Guiso' },
        { 'fillStyle': '#E89A9A  ', 'text': 'Asado' },
    ],
    'animation': {
        'type': 'spinToStop',
        'duration': 3,
        'spins': 2,
        'callbackFinished': 'mensaje()',
        'callbackAfter': 'dibujarIndicador()'
    }
});
function mensaje() {
    var elementoSeleccionado = ruleta.getIndicatedSegment();
    Swal.fire('Te tocó ' + elementoSeleccionado.text);
    ruleta.stopAnimation(false);
    ruleta.rotationAngle = 0;
    ruleta.draw();
    dibujarIndicador();
};

dibujarIndicador();
function dibujarIndicador() {
    var ctx = ruleta.ctx;
    console.log(ctx);
    ctx.strokeStyle = 'navy';
    ctx.fillStyle = 'black';
    ctx.lineWidth = 2;
    ctx.beginPath();
    ctx.moveTo(170, 0);
    ctx.lineTo(230, 0);
    ctx.lineTo(200, 40);
    ctx.lineTo(171, 0);
    ctx.stroke();
    ctx.fill();
};



let variable = document.querySelector('.h1');
console.log(variable);

// let ruletaVeggie = new Winwheel({
//     'canvasId': 'canvasVeggie',
//     'numSegments': 10,
//     'fillStyle': 'white',
//     'lineWidth': 2,
//     'segments': [
//         { 'fillStyle': 'white', 'text': '' },
//         { 'fillStyle': 'white', 'text': '2' },
//         { 'fillStyle': 'white', 'text': '3' },
//         { 'fillStyle': 'white', 'text': '4' },
//         { 'fillStyle': 'white', 'text': '5' },
//         { 'fillStyle': 'white', 'text': '6' },
//         { 'fillStyle': 'white', 'text': '7' },
//         { 'fillStyle': 'white', 'text': '8' },
//         { 'fillStyle': 'white', 'text': '9' },
//         { 'fillStyle': 'white', 'text': '10' },
//     ],
//     'animation': {
//         'type': 'spinToStop',
//         'duration': 3,
//         'spins': 3,
//         'callbackFinished': 'mensajeVeggie()',
//         'callbackAfter': 'dibujarIndicadorVeggie()'
//     }

// });
// function mensajeVeggie() {
//     var elementoSeleccionadoVeggie = ruletaVeggie.getIndicatedSegment();
//     Swal.fire('Te tocó ' + elementoSeleccionadoVeggie.text);
//     ruletaVeggie.stopAnimation(false);
//     ruletaVeggie.rotationAngle = 0;
//     ruletaVeggie.draw();
//     dibujarIndicadorVeggie();
// };

// dibujarIndicadorVeggie();
// function dibujarIndicadorVeggie() {
//     var ctx = ruletaVeggie.ctx;
//     ctx.strokeStyle = 'navy';
//     ctx.fillStyle = 'black';
//     ctx.lineWidth = 2;
//     ctx.beginPath();
//     ctx.moveTo(170, 0);
//     ctx.lineTo(230, 0);
//     ctx.lineTo(200, 40);
//     ctx.lineTo(171, 0);
//     ctx.stroke();
//     ctx.fill();
// };