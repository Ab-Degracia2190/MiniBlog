<?php
    session_start();
    include_once("../config.php");

    // Use $_GET to retrieve the blog ID from the URL query parameter
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $newtitle = mysqli_real_escape_string($conn, $_POST['newtitle']);
    $newcontent = mysqli_real_escape_string($conn, $_POST['newcontent']);

    if (isset($_POST['editblog'])) {
        $query = "UPDATE `blogs` SET `title`='$newtitle',`content`='$newcontent',`datetime`=NOW() WHERE id = '$id'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['successmsg'] = 'Blog Updated Successfully';
            header('Location: ../home');
        } else {
            $_SESSION['errormsg'] = 'Blog Update Failed';
            header('Location: ../home');
        }
    }
?>
