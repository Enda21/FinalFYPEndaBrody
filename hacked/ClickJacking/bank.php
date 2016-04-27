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
<style id="antiClickjack">body{display: none !important;}</style>
<script type="text/javascript">
	if (self === top)
	{
		//remove iframe tag strips all code and leaves the original page
	var antiClickjack = document.getElementById("antiClickjack");
	antiClickjack.parentNode.removeChild(antiClickjack);
	}
	//else its just the webapage
	else
	{
		top.location = self.location;
	}
</script>
</head>

<body>
<form action="bank.php" method="post">
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

