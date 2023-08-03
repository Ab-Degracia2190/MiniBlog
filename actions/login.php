<?php
    session_start();
    include_once("../config.php");
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (isset($_POST['login'])) {
        $query = "SELECT * FROM `users` WHERE `email`='$email'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run && mysqli_num_rows($query_run) > 0) {
            $userData = mysqli_fetch_assoc($query_run);
            $hashedPasswordFromDB = $userData['password'];

            if (password_verify($password, $hashedPasswordFromDB)) {
                $_SESSION['successmsg'] = 'Login Successful';

                $_SESSION['id'] = $userData['id'];
                $_SESSION['username'] = $userData['username'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['created'] = $userData['created'];

                header('Location: ../home');
            } else {
                $_SESSION['errormsg'] = 'Incorrect username or password';
                header('Location: ../index');
            }
        } else {
            $_SESSION['errormsg'] = 'User not found';
            header('Location: ../index');
        }
    }
?>
