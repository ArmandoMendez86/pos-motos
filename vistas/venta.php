<?php
require '../app/config/auth.php';
authFilter();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Venta</title>
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
        <!-- [ Main Content ] start -->
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div class="row m-b-25 align-items-center">
                    <div class="col-auto p-r-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart feed-icon">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                    <div class="col">
                        <a href="#!">
                            <h6 class="m-b-0">Realizar venta</h6>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-uppercase active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Servicios</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0" style="width: 100%;" id="productos">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Unidad</th>
                                    <th>precio</th>
                                    <th>Categoria</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-2">
                        <label class="mr-2">Descuento --></label>
                        <div class="input-group" style="width: 110px;">
                            <input type="number" step="1" min="1" id="descuento" class="form-control text-danger font-weight-bold p-2 text-center" value="0" aria-label="Dollar amount (with dot and two decimal places)">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table table-hover m-b-0" id="ventaProductos" style="width:100%">
                            <thead>
                                <tr>
                                    <!-- <th>Id</th> -->
                                    <th class="text-center">Codigo</th>
                                    <th>Producto</th>
                                    <th>Descripcion</th>
                                    <th class="text-center">Unidad</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="filaProducto"></tbody>
                            <tfoot>
                                <tr>
                                    <td style="font-size: 1.2rem !important;font-weight:700;text-align:right !important;" colspan="6">Total</td>
                                    <td style="color: #fff;font-size:1.2rem !important;font-weight:700;text-align:center;background-color:#000;" id="sumaTotal"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="d-flex justify-content-around mt-3">
                            <div class="d-flex mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="recibi" style="color: green;;font-weight:700;font-size:1.3rem;width:8rem;">
                                <div class="input-group-append">
                                    <span class="input-group-text">Recibí</span>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="cambio" style="color: red;;font-weight:700;font-size:1.3rem;width:8rem;">
                                <div class="input-group-append">
                                    <span class="input-group-text">Cambio</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-dark" id="realizarVenta">Cobrar</button>
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="d-flex justify-content-center align-items-center mt-2">
                        <label class="mr-2">Descuento --></label>
                        <div class="input-group" style="width: 110px;">
                            <input type="number" step="1" min="1" id="descuentoServicio" class="form-control text-danger font-weight-bold p-2 text-center" value="0" aria-label="Dollar amount (with dot and two decimal places)">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <form id="formServiciosVentas">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <select class="form-control clienteSelect" style="width: 100%;" id="clienteSelect"></select>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Tipo de Servicio</label>
                            <select class="form-control serviciosSelect" style="width: 100%" id="serviciosSelect"></select>
                        </div>
                        <div class="form-group">
                            <label for="ps">Precio</label>
                            <input type="number" class="form-control" id="ps" disabled>
                        </div>
                        <div class="form-group" hidden>
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="cs" readonly value="1">
                        </div>
                        <div class="form-group" hidden>
                            <label for="cantidad">Empleado</label>
                            <input type="number" class="form-control" id="empleado" readonly value="<?php echo $_SESSION['id'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="atendio">Atendió servicio</label>
                            <input type="text" class="form-control" id="atendioServicio">
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-outline-dark" id="ventaServicio">Cobrar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
    <!-- [ Main Content ] end -->


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
        $(document).ready(function() {
            catalogoProductos = $("#productos").DataTable({
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
                    url: "../app/productos/obtener.php",
                    method: "GET",
                    dataSrc: "",
                },
                columns: [{
                        data: "id"
                    },
                    {
                        data: "codigo",
                        render: function(data, type, row) {
                            return `<label class="badge badge-light-secondary">${data}</label>`;
                        }
                    },
                    {
                        data: "pro_serv"
                    },
                    {
                        data: "descripcion"
                    },
                    {
                        data: "unidad",
                        render: function(data, type, row) {
                            return `<label class="badge badge-light-secondary">${data}</label>`;
                        }
                    },
                    {
                        data: "precio",
                        render: function(data, type, row) {
                            let formattedTotal = data.toLocaleString('es-MX', {
                                style: 'currency',
                                currency: 'MXN'
                            });
                            return formattedTotal;

                        }
                    },
                    {
                        data: "categoria",
                        render: function(data, type, row) {
                            return `<label class="badge badge-light-secondary">${data}</label>`;
                        }
                    },
                    {
                        defaultContent: "<div class='text-center'><button class='agregarProducto btn' style = 'background-color:#000;'><i class='fa fa-plus text-white' aria-hidden='true'></i></button></div>",
                    },
                ],
                columnDefs: [{
                        targets: [0, 1, 4, 5, 6],
                        className: 'text-center'
                    },
                    {
                        targets: [0],
                        className: 'ocultar-columna'
                    },
                    /*   {
                          targets: [3], 
                          className: 'description'
                      } */
                ],

                rowCallback: function(row, data) {
                    $($(row).find("td")[5]).css("font-weight", "bold");
                    if (data['categoria'] == 'SERVICIO') {
                        $($(row)).css("display", "none");
                    }
                },

            });

            /* Venta de productos */

            $("#realizarVenta").prop("disabled", true);
            let total = 0;

            let formattedTotal = total.toLocaleString('es-MX', {
                style: 'currency',
                currency: 'MXN'
            });

            $("#sumaTotal").text(formattedTotal);

            $("#buscarProducto").keypress(function(event) {
                if (event.which === 13) {
                    event.preventDefault();
                }
            });


            $(document).on("click", ".agregarProducto", function() {

                let filaProducto = $(this).closest("tr");
                let id = parseInt(filaProducto.find("td:eq(0)").text());
                let codigo = filaProducto.find("td:eq(1)").text();
                let producto = filaProducto.find("td:eq(2)").text();
                let descripcion = filaProducto.find("td:eq(3)").text();
                let unidad = filaProducto.find("td:eq(4)").text();
                let precio = filaProducto.find("td:eq(5)").text();

                let precioNumber = parseInt(precio.replace(/[^\d.-]/g, ''));


                let cantidad = 1;
                let subtotal = precioNumber * cantidad;
                total += subtotal;
                let filasConValor = $("#filaProducto tr").filter(function() {
                    return $(this).find('td:contains("' + codigo + '")').length > 0;
                });

                if (filasConValor.length > 0) {
                    filasConValor.find("td:nth-child(7)").text(parseInt(filasConValor.find("td:nth-child(7)").text()) + cantidad);
                    filasConValor.find("td:nth-child(8)").text(parseInt(filasConValor.find("td:nth-child(6)").text()) * parseInt(filasConValor.find("td:nth-child(7)").text()));
                } else {
                    let fila = $("<tr>");
                    fila.append($("<td>").addClass("ocultar-columna").text(id));
                    fila.append($("<td>").css("text-align", "center").text(codigo));
                    fila.append($("<td>").text(producto));
                    fila.append($("<td>").text(descripcion));
                    fila.append($("<td>").css("text-align", "center").text(unidad));
                    fila.append($("<td>").css("text-align", "center").text(precioNumber));
                    fila.append($("<td>").css("text-align", "center").text(cantidad));
                    fila.append($("<td>").css("text-align", "center").text(subtotal));
                    fila.append($("<td>").css("text-align", "center").html("<i class='fa fa-trash text-danger removerProducto' style='font-size:1.3rem;' aria-hidden='true'></i>"));
                    $("#filaProducto").prepend(fila);
                }
                let formattedTotal = total.toLocaleString('es-MX', {
                    style: 'currency',
                    currency: 'MXN'
                });

                $("#sumaTotal").text(formattedTotal);
                $("#realizarVenta").prop("disabled", false);
            });


            /* IMPLEMENTACION PARA LECTOR DE CODIGO DE BARRAS */

            $("#buscarProducto").on("input", function() {
                let buscar = $(this).val();

                if (buscar == '') {
                    return
                }
                let filasConValor = $("#filasCatProductos tr").filter(function() {
                    return $(this).find('td').filter(function() {
                        return $(this).text().trim() === buscar.trim();
                    }).length > 0;
                });


                if (filasConValor.length > 0) {
                    let celdas = filasConValor.find('td');
                    let id = $(celdas[0]).text();
                    let codigo = $(celdas[1]).text();
                    let producto = $(celdas[2]).text();
                    let descripcion = $(celdas[3]).text();
                    let unidad = $(celdas[4]).text();
                    let precio = $(celdas[5]).text();

                    let cantidad = 1;
                    let subtotal = precio * cantidad;
                    total += subtotal;

                    let filasProductosVenta = $("#filaProducto tr").filter(function() {
                        return $(this).find('td:contains("' + codigo + '")').length > 0;
                    });

                    if (filasProductosVenta.length > 0) {
                        filasProductosVenta.find("td:nth-child(7)").text(parseInt(filasProductosVenta.find("td:nth-child(7)").text()) + cantidad);
                        filasProductosVenta.find("td:nth-child(8)").text(parseInt(filasProductosVenta.find("td:nth-child(6)").text()) * parseInt(filasProductosVenta.find("td:nth-child(7)").text()));
                    } else {
                        let fila = $("<tr>").css("text-align", "center");
                        fila.append($("<td>").text(id));
                        fila.append($("<td>").text(codigo));
                        fila.append($("<td>").text(producto));
                        fila.append($("<td>").text(descripcion));
                        fila.append($("<td>").text(unidad));
                        fila.append($("<td>").text(precio));
                        fila.append($("<td>").text(cantidad));
                        fila.append($("<td>").text(subtotal));
                        fila.append($("<td>").html("<i class='fa fa-trash text-danger removerProducto' style='font-size:1.3rem;' aria-hidden='true'></i>"));
                        $("#filaProducto").prepend(fila);
                    }

                    $("#sumaTotal").text(total);
                    $("#realizarVenta").prop("disabled", false);

                }

            });


            $(document).on("click", ".removerProducto", function() {
                let fila = $(this).closest("tr");
                let cantidad = parseInt(fila.find("td:eq(6)").text());
                let descontarPrecio = fila.find("td:eq(5)").text();

                if (cantidad > 0) {
                    fila.find("td:nth-child(7)").text(parseInt(fila.find("td:nth-child(7)").text()) - 1);
                    fila.find("td:nth-child(8)").text(parseInt(fila.find("td:nth-child(8)").text()) - parseInt(fila.find("td:nth-child(6)").text()));
                }

                if (cantidad == 1) {
                    fila.remove();
                }

                total = total - descontarPrecio;
                let formattedTotal = total.toLocaleString('es-MX', {
                    style: 'currency',
                    currency: 'MXN'
                });
                $("#sumaTotal").text(formattedTotal);

                let filas = $('#filaProducto tr');

                if (filas.length > 0) {
                    return;
                } else {
                    $("#realizarVenta").prop("disabled", true);
                }

            });

            $("#realizarVenta").click(function() {
                function formatDateTime(date) {
                    const year = date.getFullYear();
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const day = String(date.getDate()).padStart(2, '0');
                    const hours = String(date.getHours()).padStart(2, '0');
                    const minutes = String(date.getMinutes()).padStart(2, '0');
                    const seconds = String(date.getSeconds()).padStart(2, '0');

                    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                }
                let fechaActual = formatDateTime(new Date());

                let filas = $('#filaProducto tr');
                let datosArray = [];
                filas.each(function() {
                    let fila = $(this);
                    let p_s = fila.find('td:eq(0)').text();
                    let cantidad = fila.find('td:eq(6)').text();
                    let fecha = fechaActual;
                    let idempleado = <?php echo $_SESSION['id'] ?>;
                    let descuento = $("#descuento").val();

                    let filaObjeto = {
                        p_s: p_s,
                        cantidad: cantidad,
                        fecha: fecha,
                        idempleado: idempleado,
                        descuento: descuento,

                    }
                    datosArray.push(filaObjeto);
                });

                $.ajax({
                    url: "../app/productos/venta_producto.php",
                    type: "POST",
                    datatype: "json",
                    data: {
                        datosArray
                    },
                    success: function(response) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Venta realizada!!",
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        $('#filaProducto').empty();
                        $("#sumaTotal").empty();
                        $("#recibi").val("");
                        $("#cambio").val("");


                    },
                });

                $("#realizarVenta").prop("disabled", true);
                total = 0;
                $("#descuento").val(0)
            })

            /* 
                        $("#cantidad").on("input", function() {
                            let valorIngresado = $(this).val();
                            let total = parseInt($("#precio").val() * $("#cantidad").val());
                            $("#total").val(total);
                        }); */

            $.ajax({
                url: "../app/productos/obtener.php",
                type: "GET",
                datatype: "json",
                success: function(response) {
                    response = JSON.parse(response);
                    let servicios = response.filter(producto => producto.categoria == 'SERVICIO');
                    let serviciosSelect = $("#serviciosSelect");

                    serviciosSelect.append($('<option>', {
                        value: "",
                        text: "Seleccionar servicio"
                    }))

                    $.each(servicios, function(index, servicio) {
                        serviciosSelect.append($('<option>', {
                            value: servicio.id,
                            text: servicio.pro_serv
                        }));
                    });

                    serviciosSelect.change(function() {
                        let selectedValue = $(this).val();
                        let selectedServicio = response.find(servicio => servicio.id == selectedValue);

                        if (selectedServicio) {
                            $("#ps").val(selectedServicio.precio);
                        }
                    });
                },
            });
            $.ajax({
                url: "../app/clientes/obtener.php",
                type: "GET",
                datatype: "json",
                success: function(response) {
                    response = JSON.parse(response);
                    let select = $("#clienteSelect");
                    select.empty();
                    select.append($('<option>', {
                        value: "",
                        text: "Seleccionar cliente"
                    }));
                    $.each(response, function(index, cliente) {
                        select.append($('<option>', {
                            value: cliente.id,
                            text: cliente.nombre + " " + cliente.ap
                        }));
                    });
                },
            });


            $("#ventaServicio").click(function(e) {
                e.preventDefault();

                function formatDateTime(date) {
                    const year = date.getFullYear();
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const day = String(date.getDate()).padStart(2, '0');
                    const hours = String(date.getHours()).padStart(2, '0');
                    const minutes = String(date.getMinutes()).padStart(2, '0');
                    const seconds = String(date.getSeconds()).padStart(2, '0');

                    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                }
                let fechaActual = formatDateTime(new Date());

                let p_s = $("#serviciosSelect").val();
                let cantidad = $("#cs").val();
                let idcliente = $("#clienteSelect").val();
                let fecha = fechaActual;
                let empleado = $("#empleado").val();
                let atendioServicio = $("#atendioServicio").val().toUpperCase();
                let descuentoServicio = $("#descuentoServicio").val();


                if (p_s == '' || idcliente == '') {
                    return;
                }

                $.ajax({
                    url: "../app/productos/venta_servicio.php",
                    type: "POST",
                    datatype: "json",
                    data: {
                        p_s: p_s,
                        cantidad: cantidad,
                        idcliente: idcliente,
                        fecha: fecha,
                        idempleado: empleado,
                        atiende: atendioServicio,
                        descuento: descuentoServicio,
                    },

                    success: function(response) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Servicio pagado!",
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        $("#formServiciosVentas").trigger("reset");
                    },
                });

                $('.serviciosSelect').val(null).trigger('change');
                $('.clienteSelect').val(null).trigger('change');
                $("#descuentoServicio").val(0)
            })

            $('.serviciosSelect').select2();
            $('.clienteSelect').select2();


            $("#recibi").on("input", function() {
                let recibi = $(this).val();
                if (recibi == '' || total == '') {
                    $("#cambio").val('');
                    return
                }
                let cambio = parseFloat(recibi) - parseFloat(total);
                $("#cambio").val(cambio);

            });


        })
    </script>
</body>

</html>