<?php
     include_once('conn.php');
    $sql = "DELETE FROM user WHERE id=" . $_POST['id'];
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

header('Location: admin-dashboard.php');
exit;
?>