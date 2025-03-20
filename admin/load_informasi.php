<?php
include '../config.php';

$query = "SELECT * FROM informasi ORDER BY id_info DESC";
$result = mysqli_query($mysqli, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>