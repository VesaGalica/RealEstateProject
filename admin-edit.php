<?php
    include_once('conn.php');

    echo $_GET['id'];
    echo $_GET['is_superuser'];
    if($_GET['is_superuser']){
        $sql = "UPDATE user SET is_superuser='0' WHERE id=" .$_GET['id'] ;
    }else{
        $sql = "UPDATE user SET is_superuser='1' WHERE id=" .$_GET['id'] ;
    }

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

header('Location: admin-dashboard.php');
exit;
?>

