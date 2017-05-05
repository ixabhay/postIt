<?php
$sContent = $_POST['content'];
$db = mysqli_connect('localhost','userName','passWord','dataBaseName')
 or die('Error connecting to MySQL server.');
$query = "INSERT INTO `post` (`id`, `content`, `timestamp`) VALUES (NULL, '".$sContent."', CURRENT_TIMESTAMP)";
mysqli_query($db, $query) or die('Error querying database.');
mysqli_close($db);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
