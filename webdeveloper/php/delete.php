<?php

include 'config.php';

$id = $_POST['delete_id'];

  $sql = "DELETE FROM tbl_product WHERE product_id='". $id ."'";



if ($conn->query($sql) === TRUE) {
  header("Location: ../index.php");
} else {
  echo "Error updating record: " . $conn->error;
}

    mysqli_close($conn);
?>