<?php 
  // Connect to database
  $db = new mysqli('localhost', 'root', '', 'akoko');

  $categoryQuery = "SELECT * FROM categories";

  $categories = $db->query($categoryQuery);




  $taskQuery = "SELECT * FROM task WHERE id_user=1";

  $tasks = $db->query($taskQuery);



 ?>


<!-- Libraries & start html,head,meta,links,... -->
<?php include 'includes/link.php';?>

<body>


    <!-- NAVBAR -->
    <section class="">
      <nav class="navbar container wallpaper-navbar">
        <div class="container">
           <ul class="nav align-items-center">
              <li><i class="far fa-clock"></i></li>
              <li><a class="" href="timer.php">Timer</a></li>
              <li><a class="" href="calendar.php">Calendar</a></li>
              <li><a class="text-secondary" href="task.php">Tasks</a></li>
              <li><a class="" href="">Dashboard</a></li>
            </ul>
           <ul class="nav navbar-right align-items-center">
              <li><a href="profile.php">Profile</a></li>
              <li><a class="aux-text" href="#">Log out</a></li>
           </ul>          
        </div>
      </nav>
    </section>
    <!-- NAVBAR END-->



    <!-- TASK  -->
    <section>
      <div class="col-11 container">
        <form method="POST" action="addtask.php">
          <div class="row p-5 justify-content-center align-items-center">

                <!-- Title -->
                <button class="btn col-1 btn-pencil" type="submit" name="submit">
                   <i class="fas fa-pencil-alt"></i>
                </button>    

                <div class="col-8 p-3">

                  <input type="text" class="form-control timer-title" id="description" placeholder="Add a task ..." name="title">
                  <input type="date" name="limit_date">
                </div>

                <!-- Categories -->
                <div class="col-2 p-0">
                  <select name="category" class="form-control">
                      <option disabled selected>Categories</option>
                      <?php while ($category=$categories->fetch_assoc()) { ?>
                             <option value="<?=$category['id']?>"><?=$category['title']?></option> 
                        <?php }?>
                       
                  </select>
                </div>

            </div>
        </form>
      </div>

    </section>
    <!-- TASK END -->



    <!-- LIST TASK -->
    <section class="animated fadeInDown">
      
      <div class="col-6 container py-2">
              <?php while ($task=$tasks->fetch_assoc()) { ?>
                <div class="pb-2">
                    <div class="row text-center align-items-center btn-outline-dark rounded">
                      
                    <div class="col-2"><i class="fas fa-check-square"></i></div>
                    <div class="col-9 text-left p-2 pl-5"><?=$task['title']?></div>
                    <div class="col-1"><i class="fas fa-backspace"></i></div>
          
                </div>
             </div>
                    <?php }?>
                       
           
             
          
      </div>
   

    </section>
    <!-- LIST TASK END -->

</body>
</html>
