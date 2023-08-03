<?php
    session_start();
    include_once("../config.php");

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

    if (isset($_POST['register'])) {
        if ($password == $confirmpassword) {
            $hashedPassword = password_hash($confirmpassword, PASSWORD_DEFAULT);

            $query = "INSERT INTO `users`(`username`, `email`, `password`, `created`) VALUES ('$username','$email','$hashedPassword', NOW())";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                $_SESSION['successmsg'] = 'Registration Successful';
                header('Location: ../registration');
            } else {
                $_SESSION['errormsg'] = 'Registration Failed';
                header('Location: ../registration');
            }
        } else {
            $_SESSION['errormessage'] = 'Password does not match, Please try again';
            header('Location: ../registration');
        }
    }
?>
