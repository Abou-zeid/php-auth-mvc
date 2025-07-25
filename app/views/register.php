<?php require_once __DIR__ . "/../../sessions/session.php"; ?>
<?php displayMessage(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
.alert-overlay {
  position: fixed; /* or absolute depending on your needs */
  top: 20px;
  left: 0;
  right: 0;
  z-index: 99999; /* Extremely high value */
  display: flex;
  justify-content: center;
  pointer-events: none; /* Allows clicks to pass through when not hovering */
}

.alert-overlay .alert {
  pointer-events: auto; /* Re-enable clicks for the alert */
  max-width: 600px;
  width: 90%;
  box-shadow: 0 0 20px rgba(0,0,0,0.2);
  
  /* Required for z-index */
  position: relative;
  z-index: 99999;
  
  /* Animation */
  transition: opacity 0.5s ease-in-out;
}
</style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action ="" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name = "fname" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" Required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name = "lname" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" Required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name = "email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" Required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" Required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="cpassword" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" Required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="../public/forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="../public/index.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
      <script>
$(document).ready(function() {
  // Show the alert
  $('#autoFadeAlert').addClass('show');
  
  // Set fade out after 5 seconds (5000ms)
  setTimeout(function() {
    $('#autoFadeAlert').fadeTo(1000, 0, function() {
      $(this).removeClass('show');
    });
  }, 3000);
});
</script>   

</body>

</html>