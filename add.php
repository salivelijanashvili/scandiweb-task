<?php

include_once("classes/ProductController.php");
include_once("classes/Validation.php");
include_once("view/layout/header.php");

$pc = new ProductController();
$validation = new Validation();

if(isset($_POST['Submit'])) {
	$sku = $pc->escape_string($_POST['sku']);
	$name = $pc->escape_string($_POST['name']);
	$price = $pc->escape_string($_POST['price']);
	$size = $pc->escape_string($_POST['size']);
	$weight = $pc->escape_string($_POST['weight']);
	$height = $pc->escape_string($_POST['height']);
	$width = $pc->escape_string($_POST['width']);
	$length = $pc->escape_string($_POST['length']);
	$dimension = $height . " x " . $width . " x " . $length;
		
	$msg = $validation->check_empty($_POST, array('sku', 'name', 'price'));
    $sku_check = $validation->check_sku($_POST['sku']);
	
	
	if($msg != null) {
		echo $msg;		
	} elseif (!$sku_check) {
	    echo "SKU should be unique try again";
    } else {
		$result = $pc->execute("INSERT INTO products (sku,name,price,size,weight,dimension) VALUES('$sku','$name','$price','$size','$weight','$dimension')");
		echo "<div class='alert alert-success text-center' role='alert'>Product added successfully.<br><br><a class='btn btn-info' href='index.php'>View Product List</a></div>";
	}
}



include_once("view/layout/footer.php");
?>