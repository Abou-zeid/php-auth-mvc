<?php
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../services/Mailer.php";
require_once __DIR__ . "/../../sessions/session.php";

class AuthController {
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $name = $lname." ".$fname;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            //chech if passwords match before proceding
            if($cpassword == $password){
                $userModel = new User();

                try {
                    if ($userModel->register($name, $email, $password, "Inactive")) {
                    $_SESSION['success'] = "Registration successful! You can now log in.";
                    header("Location: index.php");
                    exit();
                    } else {
                        $_SESSION['error'] = "Registration failed.";
                        header("Location: register.php");
                       exit();
                    }
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) { // Integrity constraint violation
                        // Check if it's specifically a duplicate email
                        if (strpos($e->getMessage(), 'Duplicate entry') !== false && strpos($e->getMessage(), 'email') !== false) {
                            $_SESSION['error'] = "This email address is already registered.";
                            header("Location: register.php");
                            exit();
                        
                        } else {
                            $_SESSION['error'] = "Registration failed.";
                            header("Location: register.php");
                            exit();
                        }
                    } else {
                        $_SESSION['error'] = "Registration failed.";
                        header("Location: register.php");
                        exit();
                    }
                }
            }else{
                $_SESSION['error'] = "Passwords miss matched.";
                header("Location: register.php");
                exit();
            } 
        } else {
            require_once __DIR__ . "/../views/register.php";
        }
    }

    public function login() {
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $userModel = new User();
            $user = $userModel->login($email, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['success'] = "Welcome back " . $_SESSION['user_name'];
                header("Location: dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = "Invalid email or password.";
                header("Location: index.php");
                exit();
            }
        } else {
            require_once __DIR__ . "/../views/login.php";
        }
    }

    public function logout() {
        logout();
    }

    public function forgotPassword() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $userModel = new User();

            // Generate a unique reset token
            $token = bin2hex(random_bytes(32));
            $resetLink = "http://Localhost/atlas-inventus/public/reset-password.php?token=" . $token;
            

            if ($userModel->setResetToken($email, $token) ) {

                // // Simulate sending email (replace with actual email sending)
                // echo "<a href = '". $resetLink . "'>Reset Password</a>";
                // Send email
                $mailer = new Mailer();
                $subject = "Password Reset Request";
                $body = "<p>Hello user,</p>
                         <p>Click the link below to reset your password:</p>
                         <p><a href='{$resetLink}'>Reset Password</a></p>
                         <p>Or copy the link below to a browser.</p>
                         <p>" . $resetLink . "</p>
                         <p>If you didn't request this, please ignore this email.</p>
                         <p><b>Thank you.</b></p>";

                if ($mailer->sendMail($email, $user, $subject, $body)) {
                    $_SESSION['success'] = "A password reset link has been sent to your email.";
                } else {
                    $_SESSION['error'] = "Failed to send email. Please try again.";
                }                

            } else {
                $_SESSION['error'] = "No user found with this email!";
                
            }
                header("Location: forgot-password.php");
                exit();

        } else {
            require_once __DIR__ . "/../views/forgot-password.php";
        }
    }

    public function resetPassword() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $token = $_POST['token'];
            $newPassword = $_POST['password'];
            $comfirmPassword = $_POST['cpassword'];
            $userModel = new User();

           if($newPassword == $comfirmPassword){
                 if ($userModel->updatePassword($token, $newPassword)) {
                     $_SESSION['success'] = "Password reset successful! you can now log in.";
                     header("Location: index.php");
                     exit();
                } else {
                     $_SESSION['error'] = "Invalid or expired token!";
                     header("Location: forgot-password.php");
                     exit();
                }
           }else{
                $_SESSION['error'] = "Passwords must matched!";
                header("Location: reset-password.php?token=". $token);
                exit();
           }
        } else {
            require_once __DIR__ . "/../views/reset-password.php";
        }
    }
}
?>
