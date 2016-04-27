<!DOCTYPE html>
<meta charset = "UTF -8">
<title>Comment (XSS) </title>
</head>
<body>

<?php 

setcookie("username", "admin" , time()+3600);
setcookie("pasword","xss", time()+3600);

if($_POST['content']!=null){
	
	$fp = fopen('coments.txt','a');
	fwrite($fp, $_POST['content'] . "<hr/>\n");
	fclose($fp);
}

echo nl2br(file_get_contents('coments.txt'));
?>
<h3>Hackable</h3>
<h3>Post Comment</h3>
<form action ="index.php" method="post">
<textarea name ="content" rows="3" cols="100"></textarea>
<br/>
<input type="submit" value= "Post"/>
</form>

</body>
</html>