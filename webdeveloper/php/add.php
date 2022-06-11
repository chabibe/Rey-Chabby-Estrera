<?php

include 'config.php';

$productname = $_POST['product_name'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$expiry = $_POST['expiry'];

if($_FILES['img']['name']){
 
  move_uploaded_file($_FILES['img']['tmp_name'], "../image/".$_FILES['img']['name']);

  $img = "image/".$_FILES['img']['name'];

  }
    $sql = "INSERT INTO tbl_product(product_name, unit, price, stock, expiry, image) 
            VALUES('" . $productname . "','" . $unit . "','" . $price . "','" . $stock . "','" . $expiry . "','" . $img . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

    mysqli_close($conn);
?>