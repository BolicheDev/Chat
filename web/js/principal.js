'use strict'

window.onload = iniciar;


function iniciar() {
    document.getElementById("div-enviar").addEventListener("click", enviar);
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