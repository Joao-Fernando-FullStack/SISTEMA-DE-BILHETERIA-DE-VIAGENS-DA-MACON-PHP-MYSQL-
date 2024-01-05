setInterval(horas, 1000)

function horas() {
    var data = new Date();

    const secondsRatio = data.getUTCSeconds();
    const minutesRatio = data.getUTCMinutes();
    const hora = data.getUTCHours();

    var formulario = document.getElementById('formulario');
    var H = document.getElementById('HH');


    formulario.horaA.value = `${hora+1}:${minutesRatio}:${secondsRatio}`;

}

function datas() {
    var dataAtual = new Date;
    var ano = dataAtual.getFullYear();

    var formulario = document.getElementById('formulario');

    formulario.idade.value = ano - Number(data.value);

}