<?php
session_start();
//$product = $_POST['product'];
$quantity = $_POST['quantity'];

if($_POST['quantity']!=null){
	
	$fp = fopen('orders2.txt','a');
	fwrite($fp, $_POST['quantity'] . "\n");
	fclose($fp);
	echo "Proccced order";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>CSRF Protection</title>
</head>
<body>
<form action="" method="post">
<div class="product"> 
<strong>A product</strong>
<div class = "feild">
Quanity: <input type="text" name="quantity"  value="1">
</div>
<input type="submit" value="Order">
<input type="hidden" value="product" value="1">

			</div>
		</form>
	</body>
</html>
