<?php

if(!isset($_COOKIE['username'])) {
        
} else {
    
    $MSKH=$_COOKIE['username'];
}
if($_POST["MSHH"]){
    $MSHH=$_POST['MSHH'];
}
include "dbConfig.php";
$sql = "DELETE FROM giohang WHERE MSKH='$MSKH' and MSHH='$MSHH' ";

if ($conn->query($sql) === TRUE) {
  echo "
  <script>
    
  window.onload = function() {
    if (!window.location.hash) {
        window.location = 'giohang.php'; 
        
        
    }
}
  </script>
  ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>