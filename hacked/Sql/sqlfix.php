<?php 
$db = new PDO ('mysql:host=localhost;dbname=users','root','');
if (isset($_GET['order']))
{
	$order = $_GET['order'];

	$sql = " SELECT * FROM demo WHERE id = :order LIMIT 1";

	$statement = $db->prepare($sql);
	$statement->execute(['order' => $order]);

	//$query = $db->query($sql);

	print_r($statement->fetchObject());
}
?>