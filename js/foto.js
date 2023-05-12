// var app = (function () {

// public = {}


const tieneSoporteUserMedia = () =>
    !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
const _getUserMedia = (...arguments) =>
    (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);

// Declaramos elementos del DOM
const $video = document.querySelector("#video"),
    $canvas2 = document.querySelector("#canvas2"),
    $estado = document.querySelector("#estado"),
    $boton = document.getElementById("boton"),
    $listaDeDispositivos = document.querySelector("#listaDeDispositivos");

const limpiarSelect = () => {
    for (let x = $listaDeDispositivos.options.length - 1; x >= 0; x--)
        $listaDeDispositivos.remove(x);
};
const obtenerDispositivos = () => navigator
    .mediaDevices
    .enumerateDevices();

// La función que es llamada después de que ya se dieron los permisos
// Lo que hace es llenar el select con los dispositivos obtenidos
const llenarSelectConDispositivosDisponibles = () => {

    limpiarSelect();
    obtenerDispositivos()
        .then(dispositivos => {
            const dispositivosDeVideo = [];
            dispositivos.forEach(dispositivo => {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    dispositivosDeVideo.push(dispositivo);
                }
            });

            // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
            if (dispositivosDeVideo.length > 0) {
                // Llenar el select
                dispositivosDeVideo.forEach(dispositivo => {
                    const option = document.createElement('option');
                    option.value = dispositivo.deviceId;
                    option.text = dispositivo.label;
                    $listaDeDispositivos.appendChild(option);
                });
            }
        });
}

(function() {
    // Comenzamos viendo si tiene soporte, si no, nos detenemos
    if (!tieneSoporteUserMedia()) {
        alert("Lo siento. Tu navegador no soporta esta característica");
        $estado.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
        return;
    }
    //Aquí guardaremos el stream globalmente
    let stream;


    // Comenzamos pidiendo los dispositivos
    obtenerDispositivos()
        .then(dispositivos => {
            // Vamos a filtrarlos y guardar aquí los de vídeo
            const dispositivosDeVideo = [];

            // Recorrer y filtrar
            dispositivos.forEach(function(dispositivo) {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    dispositivosDeVideo.push(dispositivo);
                }
            });

            // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
            // y le pasamos el id de dispositivo
            if (dispositivosDeVideo.length > 0) {
                // Mostrar stream con el ID del primer dispositivo, luego el usuario puede cambiar
                mostrarStream(dispositivosDeVideo[0].deviceId);
            }
        });



    const mostrarStream = idDeDispositivo => {
        _getUserMedia({
                video: {
                    // Justo aquí indicamos cuál dispositivo usar
                    deviceId: idDeDispositivo,
                }
            },
            (streamObtenido) => {
                // Aquí ya tenemos permisos, ahora sí llenamos el select,
                // pues si no, no nos daría el nombre de los dispositivos
                llenarSelectConDispositivosDisponibles();

                // Escuchar cuando seleccionen otra opción y entonces llamar a esta función
                $listaDeDispositivos.onchange = () => {
                    // Detener el stream
                    if (stream) {
                        stream.getTracks().forEach(function(track) {
                            track.stop();
                        });
                    }
                    // Mostrar el nuevo stream con el dispositivo seleccionado
                    mostrarStream($listaDeDispositivos.value);
                }

                // Simple asignación
                stream = streamObtenido;

                // Mandamos el stream de la cámara al elemento de vídeo
                $video.srcObject = stream;
                $video.play();

                //Escuchar el click del botón para tomar la foto
                //Escuchar el click del botón para tomar la foto
                

                $boton.addEventListener("click", function() {
                    
                    //Pausar reproducción
                    let mibtnr = document.getElementById("boton").styles;
                    //$btnReg.style.font_size= "20px";
                    $video.pause();

                    //Obtener contexto del canvas2 y dibujar sobre él
                    let contexto = $canvas2.getContext("2d");
                    //$canvas2.width = $video.videoWidth;
                    $canvas2.width = "100"; //200
                    //$canvas2.height = $video.videoHeight;
                    $canvas2.height = "75"; //150
                    $canvas2.style.display = "inline-block";

                    
                    contexto.drawImage($video, 0, 0, $canvas2.width, $canvas2.height);
                    
                    
                    function ana(){
                        let datos = [];
                        
                        var imageData = contexto.getImageData(0, 0, $canvas2.width, $canvas2.height);
                            pixels = imageData.data,
                            numPixels = imageData.width * imageData.height;
                        for ( var i = 0; i < numPixels; i++ ) {

                            var r = pixels[ i * 4];
                            var g = pixels[ i * 4 + 1];
                            var b = pixels[ i * 4 + 2];

                            if(ConvertRGBtoHex(r, g, b)){
                                let alma = ConvertRGBtoHex(r, g, b)
                                datos.push(alma);
                            }
                        }
                        

                        function  ColorToHex (color) {
                            var hexadecimal = color.toString(16);
                            return hexadecimal.length == 1 ? "0" + hexadecimal : hexadecimal;
                        }
                        
                        function ConvertRGBtoHex(r, g, b) {
                            
                            hexa = "'" + ColorToHex(r) + ColorToHex(g) + ColorToHex(b) + "'";

                            if(hexa){
                                if(hexa.constructor != String){
                                    return null;
                                }
                                hexa = hexa.replace(/[^0-9A-Fa-f]/gi, '');
                                return Number.parseInt(hexa, 16);
                            }else{
                                return "No hay datos que analizar";
                            }
                            
                        }
                        if(datos){
                            const ponderado = datos.reduce((a, b) => a + b, 0) / datos.length;
                            // 
                            return Math.round(ponderado);
                        }else{
                            return "No hay que mostrar";
                        }
    
                    }
                    document.getElementById("res").value = ana();
                    
                    
                    let foto = $canvas2.toDataURL(); //Esta es la foto, en base 64
                    //let idani = document.getElementById("idani").value;
                    const music = new Audio('shutter.mp3');
                    music.play();
                    $estado.innerHTML = "Enviando foto. Por favor, espera...";
                    //alert("./index.php?pg=202&ope=fto&idani="+idani);
                    //fetch("./gfoto.php?idani="+idani, {
                    fetch("./index.php?pg=1501&ope=fto&idani="+idani,{
                    //fetch("./gfoto.php?idani="+idani, {
                            method: "POST",
                            body: encodeURIComponent(foto),
                            headers: {
                                "Content-type": "application/x-www-form-urlencoded",
                            }
                        })
                        .then(resultado => {
                            // A los datos los decodificamos como texto plano
                            return resultado.text()
                        })
                        .then(idFoto => {
                            // idFoto trae el id de la foto
                            console.log("La foto fue enviada correctamente");
                            
                            $estado.innerHTML = 'Guardada';
                            //$estado.innerHTML = `Foto guardada con éxito. Puedes verla <a target='_blank' href='./ver.php?id=${idFoto}'> aquí</a>`;
                        })

                    //Reanudar reproducción
                    $video.play();
                });
            }, (error) => {
                console.log("Permiso denegado o error: ", error);
                $estado.innerHTML = "No se puede acceder a la cámara, o no diste permiso.";
            });
    }
})();

// } () );