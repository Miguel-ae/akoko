<?php  

  // Connect to database
  $db = mysqli_connect('localhost', 'root', '', 'akoko');

  if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $category = $_POST['category'];
    $count = $_POST['count'];
    $user = $_POST['id_user'];
    


    mysqli_query($db, "INSERT INTO timer (title, id_category, id_user, count) VALUES ('$title', '$category', '$user', '$count')");
    header('location: timer.php');
  }

