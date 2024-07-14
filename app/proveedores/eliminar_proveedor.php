<?php
require '../clases/proveedor.php';

$id = $_POST['id'];
$eliminarProveedor = new Proveedor;
$eliminarProveedor->delete($id);
