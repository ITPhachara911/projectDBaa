<?php
require('../config.php');
$sql = "SELECT * FROM districts WHERE id={$_GET['id']}";
$query = $mysqli->query($sql);


$json = array();
while($result = $query->fetch_assoc()) {    
array_push($json, $result);
}
echo json_encode($json);