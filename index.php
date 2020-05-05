<!-- Libraries & start html,head,meta,links,... -->
<?php include 'includes/link.php';?>


<body class="h-100 wallpaper">


<!-- Default form login -->
<form class="text-center p-5" action="#!">

  <h1 class="logo pb-5 pt-3 animated fadeInDown">AKOKO</h1>
     <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5 col-xl-3 animated fadeInUp">
          
                <p class="h2 pt-5 title mb-4">Login</p>

                <!-- Register -->
                <p>Not a member?
                    <a href="register.php">Register</a>
                </p>

                <!-- Email -->
                <input type="email" id="LoginFormEmail" class="form-control mb-4" placeholder="E-mail">

                <!-- Password -->
                <input type="password" id="LoginFormPassword" class="form-control mb-4" placeholder="Password">

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="LoginFormRemember">
                            <label class="custom-control-label" for="LoginFormRemember">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn rounded button waves-effect btn-block font-weight-bold my-4" type="submit">Confirm</button>

                <!-- Social websites -->
                <a href="#" class="mx-2" role="button"><i class="fas fa-book-open icons"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-twitter icons"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in icons"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-github icons"></i></a>
           </div>
        </div>
     </div>

</form>
<!-- Default form login -->


<!-- Scripts & final html -->
<?php include 'includes/script.php' ?>