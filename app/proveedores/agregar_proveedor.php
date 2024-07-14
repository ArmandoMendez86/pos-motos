<?php
require '../clases/proveedor.php';

$data = $_POST;
$data['imagen'] = $_FILES['imagen'];
$agregarCliente = new Proveedor;
$agregarCliente->createUser($data);
