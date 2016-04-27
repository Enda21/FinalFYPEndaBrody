<?php
session_start();
require_once 'Token.php';

if(isset($_Post['quantity'],$_POST['token']))
{
	
}
$quantity = $_POST['quantity'];
	if(!empty($quantity))
	{
		if(Token::check($_POST['token']))
		{
			echo "Transfer Complete";
			$fp = fopen('account.txt','a');
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
<form action="orders.php" method="post">
<div class="product"> 
<strong>Transfer to account: 13242425</strong>
<div class = "feild">
	Amount $: <input type="text" name="quantity" value="1000">
</div>
<input type="submit" value="Transfer">
<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
			</div>
		</form>
	</body>
</html>

