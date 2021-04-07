<?php

include_once("classes/ProductController.php");

$pc = new ProductController();

$id = $pc->escape_string($_GET['id']);


$result = $pc->delete($id, 'products');

if ($result) {
	header("Location:index.php");
}
?>

