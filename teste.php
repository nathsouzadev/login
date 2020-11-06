<?php
require_once('conection.php');
$sql = "select senha from usuarios where id_user = 2";
$result = $conn->query($sql);
$password = mysqli_fetch_all($result);
