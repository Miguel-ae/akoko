<?php  

  // Connect to database
  $db = mysqli_connect('localhost', 'root', '', 'akoko');

  if (isset($_POST['submit'])) {
    $title = $_POST['title'];

    $user = $_POST['id_user'];
    $category = $_POST['category'];
    $limitDate = $_POST['limit_date'];


    mysqli_query($db, "INSERT INTO task (title, id_category, id_user, limit_date) VALUES ('$title', '$category', '$user', '$limitDate')");
    header('location: task.php');
  }

