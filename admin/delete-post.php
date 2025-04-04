<?php

 include('./codes/db.php');
if(isset($_POST['deletepost'])){
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM article WHERE id='$id'";
    $status=mysqli_query($db,$sql);
    session_start();
    $_SESSION['status'] = "Deleted Successfully";
    header('Location: all-blog-post.php');
  }
?>