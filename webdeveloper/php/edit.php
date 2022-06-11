<?php

include 'config.php';

$id = $_POST['edit_id'];
$productname = $_POST['edit_product_name'];
$unit = $_POST['edit_unit'];
$price = $_POST['edit_price'];
$stock = $_POST['edit_stock'];
$expiry = $_POST['edit_expiry'];

if($_FILES['edit_img']['name']){
 
  move_uploaded_file($_FILES['edit_img']['tmp_name'], "../image/".$_FILES['edit_img']['name']);

  $img = "image/".$_FILES['edit_img']['name'];

}

if($img == ""){

  $sql = "UPDATE tbl_product SET product_name ='". $productname  ."', 
                                unit = '". $unit ."',
                                price = '". $price ."',
                                expiry = '". $expiry ."',
                                stock = '". $stock ."'
                                WHERE product_id='". $id ."'";
}else{
  $sql = "UPDATE tbl_product SET product_name ='". $productname  ."', 
                                unit = '". $unit ."',
                                price = '". $price ."',
                                expiry = '". $expiry ."',
                                stock = '". $stock ."',
                                image = '". $img ."' 
                                WHERE product_id='". $id ."'";
}


if ($conn->query($sql) === TRUE) {
  header("Location: ../index.php");
} else {
  echo "Error updating record: " . $conn->error;
}

    mysqli_close($conn);
?>