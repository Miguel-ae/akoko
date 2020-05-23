<?php
session_start();
?>

<?php 
  // Connect to database
  $db = new mysqli('localhost', 'root', '', 'akoko');

  $userQuery = "SELECT * FROM users WHERE id=".$_SESSION['id_user'];

  $users = $db->query($userQuery);



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
              <li><a class="" href="task.php">Tasks</a></li>
              <li><a class="" href="">Dashboard</a></li>
            </ul>
           <ul class="nav navbar-right align-items-center">
              <li><a class="text-secondary" href="profile.php"><?php echo $_SESSION['user']; ?></a></li>
              
           </ul>          
        </div>
      </nav>
    </section>
    <!-- NAVBAR END-->


<div class="container animated fadeInDown">

  <?php while ($user=$users->fetch_assoc()) { ?>

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-start mb-3">
                  <div class="text-left text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $_SESSION['user']; ?></h4>
                    <p class="mb-0"><?=$user['email']?></p>
                  </div>
                  <div class="px-5">
                    <span class="badge badge-secondary">new member</span>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">

                  <form class="form" action="update-profile.php" method="POST">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="fullname" placeholder="John Smith" value="<?=$user['fullname']?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" type="text" name="user" placeholder="johnny.s" value="<?=$user['user']?>" maxlength="20">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" name="email" value="<?=$user['email']?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" placeholder="••••••" minlength="8" name="password">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <a class="btn btn-block btn-secondary" href="logout.php">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php }?>
</div>
</div>

</div>







</body>
</html>
