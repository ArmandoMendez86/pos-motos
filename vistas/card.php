<!DOCTYPE html>
<html lang="en">

<head>
    <title>Credencial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="card/img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="card/main.css">
</head>

<body>

    <div class="tarjeta">
        <div class="user">
            <img src="card/img/userdos.jpg" alt="" id="miImagen">
            <p id="nombre">Nombre</p>
        </div>

        <div class="qr">
            <!-- <img src="card/img/qr.png" alt=""> -->
            <div id="codigo-qr" class="mx-auto text-center"></div>
            <div class="detalles">
                <div>
                    <p>Servicio</p>
                    <p>
                        &#x1F550;
                        <span id="servicio">Tipo servicio</span>
                    </p>
                </div>
                <div>
                    <p>Finaliza</p>
                    <p>
                        &#x1F4C6;
                        <span id="vence">Fecha</span>
                    </p>
                </div>
                <!-- <div>
                    <p>Restan</p>
                    <p>15 dias</p>
                </div> -->
            </div>
        </div>

        <div class="footer">
            <img id="footerImg" src="" alt="">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>


    <!-- Agreados para funcionalidad -->

    <script src="src/moments.js"></script>
    <script src="src/datatables.min.js"></script>
    <script src="src/datatable-moments.js"></script>
    <script src="src/datatables.datatime.js"></script>
    <script src="src/sweetalert2.min.js"></script>
    <script src="src/select2.min.js"></script>
    <script src="src/qrcode.min.js"></script>


    <script>
        $(document).ready(function() {
            let id = <?php echo $_GET['id']; ?>

            $.ajax({
                url: "../app/productos/usuarioXid.php",
                type: "POST",
                datatype: "json",
                data: {
                    id: id
                },
                success: function(response) {
                    let cliente = JSON.parse(response);
                    let idCliente = cliente[0].id;
                    let nombre = cliente[0].nombre;
                    let fecha = moment(cliente[0].vence);
                    let fechaFormateada = fecha.format('DD/MM/YYYY');
                    let tipoServicio = cliente[0].pro_serv;
                    let miImagen = document.getElementById('miImagen');
                    let imagenUsuario = cliente[0].imagen;

                    if (imagenUsuario == null) {
                        miImagen.src = `../app/clientes/images/generic.jpg`;

                    } else {
                        miImagen.src = `../app/clientes/images/${imagenUsuario}`;

                    }

                    $("#nombre").text(nombre);
                    $("#servicio").text(tipoServicio);
                    $("#vence").text(fechaFormateada);


                    if (cliente[0].gen == 'M') {

                        let rutaImagen = 'card/img/mujer.gif';

                        // Establece la nueva ruta como el atributo src de la imagen
                        $("#footerImg").attr('src', rutaImagen);

                    } else {

                        let rutaImagen = 'card/img/hombre.gif';

                        // Establece la nueva ruta como el atributo src de la imagen
                        $("#footerImg").attr('src', rutaImagen);
                    }

                    const codigoQRDiv = document.getElementById('codigo-qr');
                    const codigoQR = new QRCode(codigoQRDiv, {
                        text: idCliente,
                        width: 70,
                        height: 70,
                    });

                    // Centra el código QR en el contenedor
                    codigoQRDiv.style.display = 'flex';
                    codigoQRDiv.style.justifyContent = 'center';
                    codigoQRDiv.style.alignItems = 'center';

                },
            });

        })
    </script>

</body>

</html>