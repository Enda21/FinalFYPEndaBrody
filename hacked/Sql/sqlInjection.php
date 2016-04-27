<?php 
$db = new PDO ('mysql:host=localhost;dbname=users','root','');
if (isset($_GET['order']))
{
	$order = $_GET['order'];

	$sql = " SELECT * FROM demo WHERE id = {$order} LIMIT 1";

	$query = $db->query($sql);

	print_r($query->fetchObject());
}
?>