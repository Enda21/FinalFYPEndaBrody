<?php
session_start();
require_once 'Token.php';

if(isset($_Post['quantity'],$_POST['product'],$_POST['token']))
{
}
$product = $_POST['product'];
$quantity = $_POST['quantity'];
if(!empty($product) && !empty($quantity))
	{
		if(Token::check($_POST['token']))
		{
			echo "Proccced order";
			$fp = fopen('orders.txt','a');
			fwrite($fp, $_POST['quantity'] . "\n");
			fclose($fp);
		}
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
	Quanity: <input type="text" name="quantity">
</div>
<div class = "feild">
	Product: <input type="text" name="product" value="10000">
</div>
<input type="submit" value="Order">
<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
			</div>
		</form>
	</body>
</html>

