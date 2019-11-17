'use strict'

window.onload = iniciar;


function iniciar() {
    document.getElementById("div-enviar").addEventListener("click", enviar);
    document.getElementById("chat-cuerpo").setAttribute("onload", recibir());
    setInterval(saber_recibir, 2500);
}

function enviar() {
    var texto = document.getElementById("div-mensaje").innerHTML;
    $.ajax({
        url: 'enviar',
        cache: false,
        method: 'POST',
        type: 'json',
        data: { "texto": texto },
        success: function(resultado) {
            if (JSON.parse(resultado).envia) {
                console.log("Mensaje enviado");
                var div_padre = document.createElement("div");
                div_padre.classList.add("mensaje");
                div_padre.classList.add("derecha");
                // ----------- 
                var div_cuerpo = document.createElement("div");
                div_cuerpo.classList.add("cuerpo-mensaje");
                div_padre.appendChild(div_cuerpo);
                // -----------
                var div = document.createElement("div");
                div.classList.add("texto-mensaje");
                div.innerHTML = texto;
                div_cuerpo.appendChild(div);
                document.getElementById("chat-cuerpo").appendChild(div_padre);
                // -----------
                var mover_barra = document.getElementById("chat-cuerpo").scrollHeight;
                document.getElementById("chat-cuerpo").scrollTo(0, mover_barra);
            } else {
                console.log("Fallo en el envio");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("error " + jqXHR.status + " " + errorThrown);
        }
    });
    document.getElementById("div-mensaje").innerHTML = "";
}

function recibir() {
    setInterval(saber_recibir(), 2500);
}

function saber_recibir() {
    $.ajax({
        url: 'recibir',
        cache: false,
        method: 'POST',
        type: 'json',
        success: function(result) {
            var resultado = JSON.parse(result);
            resultado.forEach(element => {
                var div_padre = document.createElement("div");
                div_padre.classList.add("mensaje");
                div_padre.classList.add("izquierda");
                // ----------- 
                var div_cuerpo = document.createElement("div");
                div_cuerpo.classList.add("cuerpo-mensaje");
                div_padre.appendChild(div_cuerpo);
                // -----------
                var div = document.createElement("div");
                div.classList.add("texto-mensaje");
                div.classList.add("usuario");
                div.innerHTML = element.id_usuario;
                div_cuerpo.appendChild(div);
                // -----------
                var div = document.createElement("div");
                div.classList.add("texto-mensaje");
                div.classList.add("mensaje-otro");
                div.innerHTML = element.texto;
                div_cuerpo.appendChild(div);
                document.getElementById("chat-cuerpo").appendChild(div_padre);
            });
            // -----------
            var mover_barra = document.getElementById("chat-cuerpo").scrollHeight;
            document.getElementById("chat-cuerpo").scrollTo(0, mover_barra);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("error " + jqXHR.status + " " + errorThrown);
        }
    });
}