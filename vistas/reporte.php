<?php
require '../app/config/auth.php';
authFilter();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Corte de ventas</title>
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
                    <!--   <li class="pc-item">
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
                            <h6 class="m-b-0">Detalle de Ventas</h6>
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
                <?php if ($_SESSION['rol'] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Cancelar venta</a>
                    </li>
                <?php endif ?>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div class="table-responsive">
                        <table id="reporteVentasProductos" class="table table-hover m-b-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">Producto</th>
                                    <th>Unidad</th>
                                    <th>Precio</th>
                                    <th>Descuento</th>
                                    <th>Vendido</th>
                                    <th>Vendió</th>
                                    <th>Fecha</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="font-size:1.3rem !important;"></th>
                                    <th style="color: #fff;border:2px solid #fff;background-color:#000;"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="table-responsive">
                        <table id="reporteVentasServicios" class="table table-hover m-b-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>ventaServicioId</th>
                                    <th>idP_S</th>
                                    <th>Servicio</th>
                                    <th>Id</th>
                                    <th>Cliente</th>
                                    <th>Apellido</th>
                                    <th>Fecha</th>
                                    <th>Registró</th>
                                    <th>Atendió</th>
                                    <th>Precio</th>
                                    <th>Descuento</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="font-size:1rem !important;"></th>
                                    <th style="color: #fff;border:2px solid #fff;background-color:#000;"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                    <div class="table-responsive">
                        <table id="cancelacionVentaProducto" class="table table-hover m-b-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>p_s</th>
                                    <th class="text-center">Producto</th>
                                    <th>Unidad</th>
                                    <th>Precio</th>
                                    <th>Descuento</th>
                                    <th>Cantidad</th>
                                    <th>Vendió</th>
                                    <th>Fecha</th>
                                    <th>Subtotal</th>
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
    <!-- [ Main Content ] end -->

    <!-- Modales -->

    <!-- Modal resumen -->
    <div class="modal fade" id="resumen" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="resumenLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resumenLabel">Resumen de ventas</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size:2.5rem;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table border="0" cellspacing="5" cellpadding="5" style="width: 100%;">

                        <p class="text-center text-dark">Ventas por periodo</p>

                        <tbody class="d-flex justify-content-center align-items-center">
                            <tr class="mr-2">
                                <td><label class="badge badge-dark">Inicio</label></td>
                                <td><input type="text" id="minResumen" name="minResumen" class="form-control form-control-sm"></td>
                            </tr>
                            <tr>
                                <td><label class="badge badge-dark">Fin</label></td>
                                <td><input type="text" id="maxResumen" name="maxResumen" class="form-control form-control-sm"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="table-responsive">
                        <table id="resumenVentasXdia" class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">Producto</th>
                                    <th>Unidad</th>
                                    <th>Compra</th>
                                    <th>Precio</th>
                                    <th>Descuento</th>
                                    <th>Vendidos</th>
                                    <th>Subtotal</th>
                                    <th>Ganancia</th>
                                    <!-- <th>Almacén</th> -->
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="font-size:1rem !important;"></th>
                                    <th style="color: #fff;border:2px solid #fff;background-color:#000;"></th>
                                    <th style="color: #fff;border:2px solid #fff;background-color:#148F77;"></th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
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

    <?php if ($_SESSION['rol'] == 1) : ?>
        <script>
            $("body").append('<div class="fixed-button active btn btn-md btn-info" style="background-color:#000;border-radius:50%;"><i class="fa fa-search btn_nuevo" aria-hidden="true" data-toggle="modal" data-target="#resumen"></i></div>');
        </script>
    <?php endif ?>

    <script>
        $(document).ready(function() {
            tablaResumen = $("#resumenVentasXdia").DataTable({
                /*   dom: 'Bfrtip',
                  buttons: [{
                      extend: 'pdfHtml5',
                      text: '<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>',
                      className: 'genpdf',
                      title: 'Resumen de ventas',
                      messageTop: 'Developer Web Ing. Armando',                    
                      download: 'open'
                  }], */
                /* paging: false, */
                language: {
                    decimal: ',',
                    emptyTable: 'No hay ventas',
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
                    url: "../app/productos/obtener_resumen_ventas.php",
                    method: "GET",
                    dataSrc: "",
                },
                columns: [{
                        data: "pro_serv"
                    },
                    {
                        data: "unidad",
                        render: function(data, type, row) {
                            return `<label class="badge badge-light-secondary">${data}</label>`;
                        }
                    },
                    {
                        data: "compra",
                        render: function(data, type, row) {
                            let formattedTotal = data.toLocaleString('es-MX', {
                                style: 'currency',
                                currency: 'MXN'
                            });
                            return formattedTotal;

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
                        data: "descuento",
                        render: function(data, type, row) {
                            if (data > 0) {
                                return `<label class="badge badge-light-danger">${data} %</label>`;
                            } else {
                                return `<label class="badge badge-light-secondary">${data} %</label>`;
                            }
                        }
                    },
                    {
                        data: "total_cantidad",
                    },
                    {
                        data: "total_subtotal",
                        render: function(data, type, row) {
                            let formattedTotal = data.toLocaleString('es-MX', {
                                style: 'currency',
                                currency: 'MXN'
                            });
                            return formattedTotal;

                        }
                    },
                    {
                        data: "ganancia",
                        render: function(data, type, row) {
                            let formattedTotal = data.toLocaleString('es-MX', {
                                style: 'currency',
                                currency: 'MXN'
                            });
                            return formattedTotal;
                        }
                    },
                    {
                        data: "fecha",
                    },

                ],
                columnDefs: [{
                        targets: [1, 2, 3, 4, 5, 6, 7],
                        className: 'text-center'
                    },
                    /*  {
                         searchable: false,
                         targets: [1, 2, 3, 6]
                     }, */
                    {
                        targets: [8],
                        render: DataTable.render.date('DD/MM/YYYY HH:mm:ss')
                    }
                ],
                "order": [
                    [8, "desc"]
                ],

                rowCallback: function(row, data) {
                    $($(row).find("td")[6]).css("font-weight", "bold");
                    $($(row).find("td")[7]).css("font-weight", "bold");

                },

                footerCallback: function(row, data, start, end, display) {
                    let api = this.api();
                    let total = api.column(6, {
                        page: 'current'
                    }).data().reduce(function(a, b) {
                        return parseFloat(a) + parseFloat(b);
                    }, 0);

                    $(api.column(5).footer()).html('TOTAL');
                    let formattedTotal = total.toLocaleString('es-MX', {
                        style: 'currency',
                        currency: 'MXN'
                    });
                    $(api.column(6).footer()).html("<p style='width:5rem;margin:auto;font-size:1rem;'>" + formattedTotal + "</p>");

                    let api2 = this.api();
                    let total2 = api2.column(7, {
                        page: 'current'
                    }).data().reduce(function(a, b) {
                        return parseFloat(a) + parseFloat(b);
                    }, 0);
                    let formattedTotal2 = total2.toLocaleString('es-MX', {
                        style: 'currency',
                        currency: 'MXN'
                    });
                    $(api2.column(7).footer()).html("<p style='width:5rem;margin:auto;font-size:1rem;'>" + formattedTotal2 + "</p>");
                }



            });


            let minResumen, maxResumen;

            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

                if (settings.nTable.id !== 'resumenVentasXdia') {
                    return true;
                }
                let min = minResumen.val();
                let max = maxResumen.val();
                let date = moment(data[8], 'DD/MM/YYYY'); // Utiliza moment para parsear la fecha

                if (
                    (min === null && max === null) ||
                    (min === null && date.isSameOrBefore(max)) ||
                    (min && date.isSameOrAfter(min) && max === null) ||
                    (min && date.isBetween(min, max))
                ) {
                    return true;
                }
            });

            minResumen = new DateTime('#minResumen', {
                format: 'DD/MM/YYYY',
                i18n: {
                    previous: '<',
                    next: '>',
                    months: [
                        'Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Agosto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'
                    ],
                    weekdays: ['Dom', 'Lun', 'Mar', 'Mir', 'Jue', 'Vie', 'Sab']
                }
            });
            maxResumen = new DateTime('#maxResumen', {
                format: 'DD/MM/YYYY',
                i18n: {
                    previous: '<',
                    next: '>',
                    months: [
                        'Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Agosto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'
                    ],
                    weekdays: ['Dom', 'Lun', 'Mar', 'Mir', 'Jue', 'Vie', 'Sab']
                }

            });

            document.querySelectorAll('#minResumen, #maxResumen').forEach((el) => {
                el.addEventListener('change', () => tablaResumen.draw());
            });

            /* TABLA DE VENTAS DE PRODUCTOS */

            tablaProductos = $("#reporteVentasProductos").DataTable({
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
                    url: "../app/productos/obtener_ventas_productos.php",
                    method: "GET",
                    data: {
                        idempleado: <?php echo $_SESSION['id'] ?>,
                        idrol: <?php echo $_SESSION['rol'] ?>
                    },
                    dataSrc: "",

                },


                columns: [{
                        data: "pro_serv"
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
                        data: "descuento",
                        render: function(data, type, row) {
                            if (data > 0) {
                                return `<label class="badge badge-light-danger">${data} %</label>`;
                            } else {
                                return `<label class="badge badge-light-secondary">${data} %</label>`;
                            }
                        }
                    },
                    {
                        data: "total_cantidad",
                    },
                    {
                        data: "nombre_empleado",
                        render: function(data, type, row) {
                            return `<label class="badge badge-light-secondary">${data}</label>`;
                        }
                    },
                    {
                        data: "fecha",
                    },
                    {
                        data: "total_subtotal",
                        render: function(data, type, row) {
                            let formattedTotal = data.toLocaleString('es-MX', {
                                style: 'currency',
                                currency: 'MXN'
                            });
                            return formattedTotal;

                        }
                    },
                ],
                columnDefs: [{
                        targets: [1, 2, 3, 4, 5, 6, 7],
                        className: 'text-center'
                    },
                    /*  {
                         searchable: false,
                         targets: [1, 2, 3, 6]
                     }, */
                    {
                        targets: [6],
                        render: DataTable.render.date('DD/MM/YYYY HH:mm:ss')

                    },
                ],
                "order": [
                    [6, "desc"]
                ],

                footerCallback: function(row, data, start, end, display) {
                    let api = this.api();
                    let total = api.column(7, {
                        page: 'current'
                    }).data().reduce(function(a, b) {
                        return parseFloat(a) + parseFloat(b);
                    }, 0);

                    $(api.column(6).footer()).html('TOTAL');
                    let formattedTotal = total.toLocaleString('es-MX', {
                        style: 'currency',
                        currency: 'MXN'
                    });
                    $(api.column(7).footer()).html("<p style='width:5rem;margin:auto;font-size:1rem'>" + formattedTotal + "</p>");
                },


                rowCallback: function(row, data) {
                    $($(row).find("td")[7]).css("font-weight", "bold");
                },
            });


            /* TABLA DE VENTA DE SERVICIOS */

            tablaServicios = $("#reporteVentasServicios").DataTable({
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
                    url: "../app/productos/obtener_ventas_servicios.php",
                    method: "GET",
                    dataSrc: "",
                },
                columns: [{
                        data: "venta_servicio_id"
                    },
                    {
                        data: "p_s"
                    },
                    {
                        data: "pro_serv"
                    },
                    {
                        data: "cliente_id"
                    },
                    {
                        data: "nombre_cliente"
                    },
                    {
                        data: "ap_cliente"
                    },
                    {
                        data: "fecha"
                    },
                    {
                        data: "nombre_empleado",
                        render: function(data, type, row) {
                            return `<label class="badge badge-light-secondary">${data}</label>`;
                        }
                    },
                    {
                        data: "atiende"
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
                        data: "descuento",
                        render: function(data, type, row) {
                            if (data > 0) {
                                return `<label class="badge badge-light-danger">${data} %</label>`;
                            } else {
                                return `<label class="badge badge-light-secondary">${data} %</label>`;
                            }
                        }
                    },
                    {
                        data: "cantidad"
                    },
                    {
                        data: "subtotal",
                        render: function(data, type, row) {
                            let formattedTotal = data.toLocaleString('es-MX', {
                                style: 'currency',
                                currency: 'MXN'
                            });
                            return formattedTotal;

                        }
                    },
                    {
                        defaultContent: "<div class='d-flex justify-content-center'><?php echo $_SESSION['rol'] == 1 ? "<i class='icon feather icon-trash f-20 eliminarServicio text-danger'></i>" : '' ?></div>",
                    },
                ],
                columnDefs: [{
                        targets: [7, 8, 9, 10, 11],
                        className: 'text-center',
                    },
                    /*  {
                         searchable: false,
                         targets: [0, 1, 2, 3, 6, 7, 8, 11, 12, 13, 14]
                     }, */
                    {
                        targets: [0, 1, 3],
                        className: 'ocultar-columna'
                    },

                    {

                        targets: [6],
                        render: DataTable.render.date('DD/MM/YYYY HH:mm:ss')

                    }
                ],
                "order": [
                    [6, "desc"]
                ],

                rowCallback: function(row, data) {
                    $($(row).find("td")[12]).css("font-weight", "bold");
                },

                footerCallback: function(row, data, start, end, display) {
                    let api = this.api();
                    let total = api.column(12, {
                        page: 'current'
                    }).data().reduce(function(a, b) {
                        return parseFloat(a) + parseFloat(b);
                    }, 0);

                    $(api.column(11).footer()).html('TOTAL');
                    let formattedTotal = total.toLocaleString('es-MX', {
                        style: 'currency',
                        currency: 'MXN'
                    });
                    $(api.column(12).footer()).html("<p style='width:5rem;margin:auto;font-size:1rem'>" + formattedTotal + "</p>");

                }
            });


            /* PARA CANCELACIÓN DE VENTAS */

            cancelacionProducto = $("#cancelacionVentaProducto").DataTable({
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
                    url: "../app/productos/ventas_productos_all.php",
                    method: "GET",
                    dataSrc: "",

                },
                columns: [{
                        data: "id"
                    },
                    {
                        data: "p_s"
                    },
                    {
                        data: "pro_serv"
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
                        data: "descuento",
                        render: function(data, type, row) {
                            if (data > 0) {
                                return `<label class="badge badge-light-danger">${data} %</label>`;
                            } else {
                                return `<label class="badge badge-light-secondary">${data} %</label>`;
                            }
                        }
                    },
                    {
                        data: "cantidad",
                    },
                    {
                        data: "nombre_empleado",
                        render: function(data, type, row) {
                            return `<label class="badge badge-light-secondary">${data}</label>`;
                        }
                    },
                    {
                        data: "fecha",
                    },
                    {
                        data: "subtotal",
                        render: function(data, type, row) {
                            let formattedTotal = data.toLocaleString('es-MX', {
                                style: 'currency',
                                currency: 'MXN'
                            });
                            return formattedTotal;

                        }
                    },
                    {
                        defaultContent: "<div class='text-center'><i class='fa fa-trash text-danger eliminarProducto' aria-hidden='true'></i>",
                    },
                ],
                columnDefs: [{
                        targets: [3, 4, 5, 6, 7, 8, 9],
                        className: 'text-center'
                    },
                    /*  {
                         searchable: false,
                         targets: [1, 2, 3, 6]
                     }, */
                    {
                        targets: [0, 1],
                        className: 'ocultar-columna'
                    },
                    {
                        targets: [8],
                        render: DataTable.render.date('DD/MM/YYYY HH:mm:ss')

                    },
                ],
                "order": [
                    [8, "desc"]
                ],

                rowCallback: function(row, data) {
                    $($(row).find("td")[9]).css("font-weight", "bold");
                },
            });

            $(document).on("click", ".eliminarServicio", function() {
                let fila = $(this).closest("tr");
                let id = parseInt($(this).closest("tr").find("td:eq(0)").text());
                Swal.fire({
                    title: "Estas seguro?",
                    /* text: "Esto no se podrá revertir!", */
                    icon: "question",
                    showCancelButton: true,
                    cancelButtonText: "Cancelar!",
                    cancelButtonColor: "#6c757d",
                    confirmButtonColor: "#7267EF",
                    confirmButtonText: "Si, eliminar!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "../app/productos/eliminar_venta_servicio.php",
                            type: "POST",
                            datatype: "json",
                            data: {
                                id: id
                            },
                            success: function() {
                                tablaServicios.ajax.reload(null, false);
                                Swal.fire("Eliminado!", "Servicio eliminado!!", "success");
                            }
                        })
                    }
                })
            })
            $(document).on("click", ".eliminarProducto", function() {
                let fila = $(this).closest("tr");
                let id = parseInt($(this).closest("tr").find("td:eq(0)").text());
                let p_s = parseInt($(this).closest("tr").find("td:eq(1)").text());
                let cantidad = parseInt($(this).closest("tr").find("td:eq(4)").text());
                Swal.fire({
                    title: "Estas seguro?",
                    /* text: "Esto no se podrá revertir!", */
                    icon: "question",
                    showCancelButton: true,
                    cancelButtonText: "Cancelar!",
                    confirmButtonColor: "#040404",
                    cancelButtonColor: "#b93737",
                    confirmButtonText: "Si, eliminar!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "../app/productos/eliminar_venta_producto.php",
                            type: "POST",
                            datatype: "json",
                            data: {
                                id: id,
                                p_s: p_s,
                                cantidad: cantidad
                            },
                            success: function() {
                                tablaProductos.ajax.reload(null, false);
                                tablaResumen.ajax.reload(null, false);
                                cancelacionProducto.ajax.reload(null, false);
                                Swal.fire("Eliminado!", "Venta eliminada!!", "success");
                            }
                        })
                    }
                })
            })

        })
    </script>
</body>

</html>