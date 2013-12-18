<?php

require "models/connect.php";

$results= array();

if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $results = $conn->get_item($id);

    echo json_encode($results);

} else {

    $results['status'] = "failed";

    echo json_encode($results);

}

