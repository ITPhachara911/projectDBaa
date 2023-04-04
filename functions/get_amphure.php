<?php
require('../config.php');
$sql = "SELECT * FROM amphures WHERE province_id={$_GET['province_id']}";
$query = $mysqli->query($sql);


$json = array();
while($result = $query->fetch_assoc()) {    
array_push($json, $result);
}
echo json_encode($json);