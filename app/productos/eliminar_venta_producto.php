<?php
require '../clases/producto.php';

$data = $_POST;

/* $id = $_POST['id'];
$cantidad = $_POST['cantidad']; */
$eliminarVentaProducto = new Producto;
$eliminarVentaProducto->eliminarVentaProducto($data['id']);
$eliminarVentaProducto->restablecerAlmacen($data);
