<?php
require('../config.php');
$sql = "SELECT * FROM districts WHERE amphure_id={$_GET['amphure_id']}";
$query = $mysqli->query($sql);


$json = array();
while($result = $query->fetch_assoc()) {    
array_push($json, $result);
}
echo json_encode($json);