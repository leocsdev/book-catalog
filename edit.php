<?php
  include_once('connections/connection.php');
  $con = connection();

  $id = $_GET['id'];
  
  $sql = "SELECT * FROM `books_list` WHERE `id` = '$id'";
  $books = $con -> query($sql) or die ($con -> error);
  $row = $books -> fetch_assoc();


  if (isset($_POST['edit-book'])) {
    echo "UPDATED BOOK!";
    // $title = $_POST['title'];
    // $isbn = $_POST['isbn'];
    // $author = $_POST['author'];
    // $publisher = $_POST['publisher'];
    // $year_published = $_POST['year_published'];
    // $category = $_POST['category'];
    
    // $sql = "UPDATE `books_list` SET `title` = '$title', `last_name` = '$lastName', `birthday` = '$birthday', gender = '$gender' WHERE `id` = '$id'";

    // $con -> query($sql) or die ($con -> error);

    // // redirect to details.php after updating student info
    // echo header("Location: details.php?id=".$id);
  }

?>


