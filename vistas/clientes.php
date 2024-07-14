<?php
require '../app/config/auth.php';
authFilter();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clientes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <!-- Favicon icon -->
    <link rel="icon" href="../assets/images/logop2.png" type="image/x-icon">

    <!-- font css -->
    <link rel="stylesheet" href="../assets/fonts/font-awsome-pro/css/pro.min.css">
    <link rel="stylesheet" href="../assets/fonts/feather.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    <!-- vendor css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/customizer.css">


    <!-- Agreados para funcionalidad -->

    <link rel="stylesheet" href="src/datatables.min.css">
    <link rel="stylesheet" href="src/select2.min.css">
    <link rel="stylesheet" href="src/sweetalert2.min.css">
    <link rel="stylesheet" href="src/datatables.datetime.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Mobile header ] start -->
    <div class="pc-mob-header pc-header">
        <div class="pcm-logo">
            <img src="../assets/images/logop2.png" alt="" class="logo logo-lg rounded-circle" width="55">
        </div>
        <div class="pcm-toolbar">
            <a href="#!" class="pc-head-link" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>
            <a href="#!" class="pc-head-link" id="header-collapse">
                <i data-feather="log-out"></i>
            </a>
        </div>
    </div>
    <!-- [ Mobile header ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pc-sidebar ">
        <div class="navbar-wrapper">
            <div class="m-header justify-content-center">
                <a href="#" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img width="130" src="../assets/images/logo2.png" alt="" class="logo logo-lg rounded-circle">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <?php if ($_SESSION['rol'] == 1) : ?>
                        <li class="pc-item pc-caption d-flex align-items-center">
                            <i data-feather="airplay"></i>
                            <label class="pl-2">Panel</label>
                        </li>
                        <li class="pc-item">
                            <a href="panel.php" class="pc-link "><span class="pc-micon"><i data-feather="chevron-right"></i></span><span class="pc-mtext">Tablero</span></a>
                        </li>
                    <?php endif ?>
                    <li class="pc-item pc-caption d-flex align-items-center">
                        <i data-feather="users"></i>
                        <label class="pl-2">Usuarios</label>
                    </li>

                    <li class="pc-item">
                        <a href="clientes.php" class="pc-link "><span class="pc-micon"><i data-feather="chevron-right"></i></span><span class="pc-mtext">Clientes</span></a>
                    </li>
                    <!--  <li class="pc-item">
                        <a href="proveedores.php" class="pc-link "><span class="pc-micon"><i data-feather="chevron-right"></i></span><span class="pc-mtext">Proveedores</span></a>
                    </li> -->
                    <?php if ($_SESSION['rol'] == 1) : ?>
                        <li class="pc-item">
                            <a href="empleados.php" class="pc-link "><span class="pc-micon"><i data-feather="chevron-right"></i></span><span class="pc-mtext">Empleados</span></a>
                        </li>
                    <?php endif ?>

                    <li class="pc-item pc-caption d-flex align-items-center">
                        <i data-feather="shopping-cart"></i>
                        <label class="pl-2">Ventas</label>
                    </li>
                    <li class="pc-item">
                        <a href="venta.php" class="pc-link "><span class="pc-micon"><i data-feather="chevron-right"></i></span><span class="pc-mtext">Punto de venta</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="reporte.php" class="pc-link "><span class="pc-micon"><i data-feather="chevron-right"></i></span><span class="pc-mtext">Reporte de venta</span></a>
                    </li>
                    <?php if ($_SESSION['rol'] == 1) : ?>
                        <li class="pc-item pc-caption">
                            <i data-feather="package"></i>
                            <label>Almacén</label>
                        </li>
                        <li class="pc-item">
                            <a href="productos.php" class="pc-link "><span class="pc-micon"><i data-feather="chevron-right"></i></span><span class="pc-mtext">Productos</span></a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="pc-header ">
        <div class="header-wrapper">

            <div class="ml-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="../assets/images/user/user.png" alt="user-image" class="user-avtar">
                            <span>
                                <span class="user-name"><?php echo $_SESSION['usuario'] ?></span>
                                <span class="user-desc"><?php echo $_SESSION['rol'] == 1 ? "<label class='badge text-white bg-dark'>Administrador</label>" : "<label class='badge text-white bg-dark'>Empleado</label>" ?></span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
                            <a href="../app/login/cerrar_sesion.php" class="dropdown-item">
                                <img width="40" src="../assets/images/motocicleta.png" alt="moto" class="mr-2">
                                <span>Cerrar sesión</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pcoded-content">

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- Tabla de clientes -->
                <div class="col-xl-12 col-md-12">
                    <div class="card table-card" style="background-color: transparent;">
                        <div class="card-header text-center">
                            <div class="row m-b-25 align-items-center justify-content-center">
                                <div class="pr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text feed-icon">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <a href="#!">
                                        <h6 class="m-b-0">Catalogo de Clientes</h6>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="pro-scroll p-2" style="position:relative;">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0" id="clientes" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Sexo</th>
                                                <th>Correo</th>
                                                <!-- <th>Imagen</th> -->
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- customer-section end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Modales -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregar Cliente</h5>
                </div>
                <div class="modal-body">
                    <form id="formClientes" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="paterno">Apellido</label>
                            <input type="text" class="form-control" id="ap" placeholder="Apellido paterno">
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <!-- <input type="text" class="form-control" id="ap" placeholder="Apellido paterno"> -->
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="H">HOMBRE</option>
                                <option value="M">MUJER</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <!--  <div class="form-group">
                            <label for="imagen">Foto</label>
                            <div class="d-flex align-items-center">
                                <input type="file" class="form-control-file" id="imagen" accept="image/*" name="imagen">
                                <div class="text-center mt-2 w-25"><img src="" alt="Imagen del cliente" class="imagen-cliente rounded-circle" width="100%"></div>
                            </div>
                        </div> -->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelar">Cancelar</button>
                    <button type="button" class="btn btn-dark" id="agregarCliente">Guardar</button>
                    <button type="button" class="btn btn-dark" id="actualizarCliente">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="../assets/js/plugins/feather.min.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="../assets/js/plugins/clipboard.min.js"></script>
    <script src="../assets/js/uikit.min.js"></script>

    <!-- Agreados para funcionalidad -->

    <script src="src/moments.js"></script>
    <script src="src/datatables.min.js"></script>
    <script src="src/datatable-moments.js"></script>
    <script src="src/datatables.datatime.js"></script>
    <script src="src/sweetalert2.min.js"></script>
    <script src="src/select2.min.js"></script>
    <script src="src/qrcode.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script>
        $("body").append('<div class="fixed-button active btn btn-md btn-info" style="background-color:#000;border-radius:50%;"><i class="fa fa-plus btn_nuevo" aria-hidden="true" data-toggle="modal" data-target="#staticBackdrop" id="abrirModal"></i></div>');
    </script>

    <script>
        $(document).ready(function() {
            let fila = null;
            let id = null;
            tablaClientes = $("#clientes").DataTable({
                /* paging: false, */
                language: {
                    decimal: ',',
                    emptyTable: 'No hay datos',
                    info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
                    infoEmpty: 'Mostrando 0 a 0 de 0 registros',
                    infoFiltered: '(filtrado de un total de _MAX_ registros)',
                    lengthMenu: 'Mostrar _MENU_ registros',
                    loadingRecords: 'Cargando...',
                    paginate: {
                        first: 'Primero',
                        last: 'Último',
                        next: '>',
                        previous: '<'
                    },
                    processing: 'Procesando...',
                    search: 'Buscar:'
                },
                lengthMenu: [
                    [5, 10, 15, -1],
                    [5, 10, 15, 'Todos']
                ],
                ajax: {
                    url: "../app/clientes/obtener.php",
                    method: "GET",
                    dataSrc: "",
                },
                columns: [{
                        data: "id"
                    },
                    {
                        data: "nombre"
                    },
                    {
                        data: "ap"
                    },
                    {
                        data: "gen",
                        render: function(data, type, row) {
                            if (data == 'M') {
                                return `<label class="badge badge-light-secondary">${data}</label>`;
                            } else {
                                return `<label class="badge badge-light-secondary">${data}</label>`;
                            }
                        }
                    },
                    {
                        data: "email",
                        render: function(data, type, row) {
                            return `<label class="badge badge-light-secondary text-secondary">${data}</label>`;
                        }
                    },
                    /* {
                        data: "imagen",
                        render: function(data, type, row) {
                            if (data == null) {
                                return `<img src="../app/clientes/images/generic.jpg" alt="Imagen" class="rounded-circle" width="40" height="40">`;
                            } else {
                                return `<img src="../app/clientes/images/${data}" alt="Imagen" class="rounded-circle" width="40" height="40">`;
                            }
                        }
                    }, */
                    {
                        defaultContent: "<div class='d-flex justify-content-center'><button class='btnEditar btn p-1'><i class='icon feather icon-edit f-16  text-success'></i></button> <?php echo $_SESSION['rol'] == 1 ? "<button class='btnBorrar btn p-1'><i class='feather icon-trash-2 f-16 text-danger'></i></button>" : '' ?> <button class='btn enviarCredencial p-1'><i class='feather icon-credit-card f-16 text-primary'></i></button></div>"

                    },
                ],
                columnDefs: [{
                        targets: [0, 3, 5],
                        className: 'text-center'
                    },
                    {
                        targets: [0],
                        className: 'ocultar-columna'
                    },
                ],

                /* rowCallback: function(row, data) {
                    if (data['gen'] == 'M') {

                        $($(row).find("td")[3]).find("label").css("background-color", "#E636E1");

                    }
                }, */
            });

            // Añadir evento change para cargar la imagen desde el input file
            /*  $('#imagen').change(function() {
                 const input = this;
                 if (input.files && input.files[0]) {
                     const reader = new FileReader();
                     reader.onload = function(e) {
                         $('.imagen-cliente').attr('src', e.target.result);
                     }
                     reader.readAsDataURL(input.files[0]);

                 }
             }); */

            $("#abrirModal").click(function() {
                $("#actualizarCliente").addClass('d-none');
                $("#agregarCliente").removeClass('d-none');
            })



            $("#agregarCliente").click(function(e) {
                e.preventDefault();
                let nombre = $.trim($("#nombre").val()).toUpperCase();
                let ap = $.trim($("#ap").val()).toUpperCase();
                let sexo = $("#sexo").val();
                let email = $.trim($("#email").val());
                /* let imagenInput = document.getElementById('imagen');
                let imagen = imagenInput.files[0]; */


                if (nombre == '') {
                    return;
                }

                let formData = new FormData();
                formData.append('nombre', nombre);
                formData.append('ap', ap);
                formData.append('gen', sexo);
                formData.append('email', email);
                /* formData.append('imagen', imagen); */

                $.ajax({
                    url: "../app/clientes/agregar_cliente.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Cliente registrado!",
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        tablaClientes.ajax.reload(null, false);
                        $("#staticBackdrop").modal("hide");
                        $("#formClientes").trigger("reset");
                    },
                });
            });

            document.querySelector('#cancelar').addEventListener('click', () => {
                id = null;
                fila = null;
                $("#formClientes").trigger("reset");
            })

            $(document).on("click", ".btnEditar", function() {

                fila = $(this).closest("tr");
                id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
                let nombre = fila.find("td:eq(1)").text();
                let ap = fila.find("td:eq(2)").text();
                let sexo = fila.find("td:eq(3)").text();
                let email = fila.find("td:eq(4)").text();
                /* let imagen = fila.find("td:eq(5) img");
                let src = imagen.attr("src"); */

                $("#nombre").val(nombre);
                $("#ap").val(ap);
                $("#sexo").val(sexo);
                $("#email").val(email);

                /*  $('.imagen-cliente').attr('src', src).css({
                     'width': '80',
                     'height': '80'
                 }); */

                $("#staticBackdrop").modal("show");
                $("#actualizarCliente").removeClass('d-none');
                $("#agregarCliente").addClass('d-none');
            });

            $("#actualizarCliente").click(function() {
                let nombre = $("#nombre").val().toUpperCase();
                let ap = $("#ap").val().toUpperCase();
                let sexo = $("#sexo").val();
                let email = $("#email").val();
                /*     let imagenInput = document.getElementById('imagen');
                    let nuevaImagen = imagenInput.files[0]; */

                let formData = new FormData();
                formData.append('id', id);
                formData.append('nombre', nombre);
                formData.append('ap', ap);
                formData.append('gen', sexo);
                formData.append('email', email);

                /*  if (nuevaImagen) {
                     formData.append('imagen', nuevaImagen);
                 } */

                $.ajax({
                    url: "../app/clientes/actualizar_cliente.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Cliente actualizado!",
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        tablaClientes.ajax.reload(null, false);
                        $("#staticBackdrop").modal("hide");
                        $("#formClientes").trigger("reset");
                    },
                });
            })

            $(document).on("click", ".btnBorrar", function() {
                let fila = $(this).closest("tr");
                let id = parseInt($(this).closest("tr").find("td:eq(0)").text());
                Swal.fire({
                    title: "Estas seguro?",
                    text: "Esto no se podrá revertir!",
                    icon: "question",
                    showCancelButton: true,
                    cancelButtonText: "Cancelar!",
                    cancelButtonColor: "#6c757d",
                    confirmButtonColor: "#7267EF",
                    confirmButtonText: "Si, Eliminalo!",
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: "../app/clientes/eliminar_cliente.php",
                            type: "POST",
                            datatype: "json",
                            data: {
                                id: id
                            },
                            success: function(response) {
                                tablaClientes.ajax.reload(null, false);
                                Swal.fire("Eliminado!", "Cliente eliminado!", "success");

                            }
                        })
                    }
                })
            })

            /* $(document).on("click", ".enviarCredencial", function() {
                fila = $(this).closest("tr");
                id = parseInt(fila.find("td:eq(0)").text());
                let nombre = fila.find("td:eq(1)").text();
                let apellido = fila.find("td:eq(2)").text();
                let sexo = fila.find("td:eq(3)").text();
                let email = fila.find("td:eq(4)").text();
                let accion = fila.find("td:eq(6)");

                let controles = accion.find("div");
                $(".enviarCredencial").addClass('d-none');
                let spiner = "<div class='spinner-border text-primary ml-2' role='status'><span class='sr-only'>Loading...</span></div>";
                controles.append(spiner);

                $.ajax({
                    url: "../app/clientes/card_digital.php",
                    type: "POST",
                    datatype: "json",
                    data: {
                        id: id,
                        email: email
                    },
                    success: function(response) {
                        Swal.fire("Bien!", response, "success");
                        $(".enviarCredencial").removeClass('d-none');
                        controles.find('.spinner-border').remove();
                    }
                })

            }); */
        })
    </script>
</body>

</html>