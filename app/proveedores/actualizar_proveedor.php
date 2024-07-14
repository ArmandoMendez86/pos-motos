<?php
require '../clases/proveedor.php';

$data = $_POST;
$data['imagen'] = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;
$actualizarProveedor = new Proveedor;
$actualizarProveedor->updateUser($data);
