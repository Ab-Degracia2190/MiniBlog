<?php
    session_start();
    include_once("../config.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $blogID = mysqli_real_escape_string($conn, $_POST['id']);

        $query = "DELETE FROM `blogs` WHERE `id` = '$blogID'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['successmsg'] = 'Blog Deleted Successfully';
            echo 'Blog Deleted Successfully'; 
        } else {
            $_SESSION['errormsg'] = 'Blog Deletion Failed';
            echo 'Blog Deletion Failed'; 
        }
    }
?>
