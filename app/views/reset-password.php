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

    <title>Reset Password</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Please Reset your Password</h1>
                                    </div>
                                    <?php if (isset($_GET['token'])): ?>
                                    <form action="" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="hidden" name = "token" value="<?= htmlspecialchars($_GET['token']); ?>" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="New Password" Required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="cpassword" class="form-control form-control-user" id="exampleInputPassword" 
                                            placeholder="Confirm New Password" Required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>                                        
                                    </form>
                                    <hr>
                                    <?php else: ?>
                                    <p class="text-center">Invalid or missing token.</p>
                                    <?php endif; ?>

                                    <div class="text-center">
                                        <a class="small" href="../public/index.php">Back to Login</a>
                                    </div>
                                    
                                </div>
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
    <script src="js/sb-admin-2.min.js"></script><script>
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