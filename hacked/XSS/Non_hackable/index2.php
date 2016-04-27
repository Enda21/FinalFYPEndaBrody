<!DOCTYPE html>
<meta charset = "UTF -8">
<title>Comment (XSS) </title>
</head>
<body>

<?php 

setcookie("username", "admin" , time()+3600);
setcookie("pasword","xss", time()+3600);

if($_POST['content']!=null){
	
	$fp = fopen('coments2.txt','a');
	fwrite($fp, $_POST['content'] . "<hr/>\n");
	fclose($fp);
}

$string = "<h1>This has <i>tags</i></h1>";

echo htmlentities(strip_tags(nl2br(file_get_contents('coments2.txt'))))?>
<h1>Non-hackable</h1>
<h3>Post Comment</h3>
<form action ="index2.php" method="post">
<textarea name ="content" rows="3" cols="100"></textarea>
<br/>
<input type="submit" value= "Post"/>
</form>

</body>
</html>