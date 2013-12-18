<?php

require "functions.class.php";
require "models/item.model.php";
require "models/connect.php";

// Get all items from inventory table
$items = null;
$data = array();
$action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : "";


$data['status'] = isset($_GET['status']) ? htmlspecialchars($_GET['status']) : "";


if($conn) {
    $items = $conn->get_all_items();

}

// Add item to inventory table in database

if (isset($_POST['add'])) {

    $id = "";
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $week_price = trim($_POST['week_price']);
    $month_price = trim($_POST['month_price']);
    $three_month_price = trim($_POST['three_month_price']);
    $stock = trim($_POST['stock']);
    $asset_number = trim($_POST['asset_number']);

    $item = new Item($id, $name, $description, $category, $week_price, $month_price, $three_month_price, $stock, $asset_number);

    if($conn) {
        $conn->add_item($item);
        $data['status'] = 'Successfully added a new product';
    }

    header('location: index.php?status=Successfully added a new product');


}

// Edit action

if($action == 'edit') {

    header("content-type:application/json");

    $results= array();

    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        $results = $conn->get_item($id);

        echo json_encode($results);
    }

    exit();
}

// Update action

if(isset($_POST['update'])) {

    $item = array(
        'id' => trim($_POST['update']),
        'pName' => trim($_POST['name']),
        'description' => trim($_POST['description']),
        'category' => trim($_POST['category']),
        'week_price' => trim($_POST['week_price']),
        'month_price' => trim($_POST['month_price']),
        'three_month_price' => trim($_POST['three_month_price']),
        'stock' => trim($_POST['stock']),
        'asset_number' => trim($_POST['asset_number'])
    );

    if ($conn) {
        $conn->update_item($item);
        header('location: index.php?status=successfully updated item');
    } else {
        echo "Error: No DB connection";
    }

}

// Delete action

if($action == 'delete') {

    $id = $_GET['id'];

    $conn->delete_item($id);
    $data['status'] = "Deleted item: $id";

    header("location: index.php?status=deleted item: $id");
}

//Call view class method and pass in view name and data

$data['title'] = 'Inventory';
$data['items'] = $items;
$data['date'] = new DateTime('today');
$data['categories'] = $conn->get_categories();

Functions::view('index', $data);

