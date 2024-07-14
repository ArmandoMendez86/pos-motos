<?php
require '../clases/proveedor.php';

$proveedores = new Proveedor;
echo json_encode($proveedores->getAll());
