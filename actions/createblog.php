<?php
    session_start();
    include_once("../config.php");

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    if (isset($_POST['createblog'])) {
            $query = "INSERT INTO `blogs`(`title`, `content`, `datetime`) VALUES ('$title','$content',NOW())";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                $_SESSION['successmsg'] = 'Blog Created Successfully';
                header('Location: ../home');
            } else {
                $_SESSION['errormsg'] = 'Blog Creation Failed';
                header('Location: ../home');
            }
    }
?>
