<!-- Libraries & start html,head,meta,links,... -->
<?php include 'includes/link.php';?>


<body class="h-100 wallpaper">

	<!-- Default form register -->
<form class="text-center p-5" action="#!">
<h1 class="logo pb-5 pt-3 animated fadeInDown">AK<i class="far fa-clock"></i>KO</h1>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-5 col-xl-3 animated fadeInUp"> 
			    <p class="h2 pt-5 title mb-4">Sign up</p>
					 <!-- Register -->
			      <p>Do you have account?
			          <a href="index.php">Log in</a>
			      </p>
			    
			        <div class="mb-4">
			            <!-- Full name -->
			            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Full name">
			        </div>
			        <div class="mb-4">
			            <!-- Nick name -->
			            <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Nickname">
			        </div>

			    <!-- E-mail -->
			    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

			    <!-- Password -->
			    <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
			    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
			        At least 8 characters
			    </small>

			    <!-- Sign up button -->
			    <button class="btn rounded button waves-effect btn-block font-weight-bold my-4" type="submit">Sign in</button>

				<!-- Social websites -->
	            <a href="#" class="mx-2" role="button"><i class="fas fa-book-open icons"></i></a>
	            <a href="#" class="mx-2" role="button"><i class="fab fa-twitter icons"></i></a>
	            <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in icons"></i></a>
	            <a href="#" class="mx-2" role="button"><i class="fab fa-github icons"></i></a>

			</div>
		</div>
</form>
<!-- Default form register -->


<!-- Scripts & final html -->
<?php include 'includes/script.php' ?>