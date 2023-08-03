<?php include("includes/header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <!-- navbar -->
        <?php include("includes/navbar.php");?>
    <!-- navbar end -->

    <div class="container title">
        <p class="title">Registration</p>
    </div>

    <div class="container">
        <div class="card registrationcard">
            <div class="card-header"><p>See the Registration Rules</p></div>
            <div class="messages">
                <?php
                    if (isset($_SESSION['errormessage']) || isset($_SESSION['errormsg'])) {
                        if (isset($_SESSION['errormessage'])) {
                            echo '<p class="errormsg">' . $_SESSION['errormessage'] . '</p>';
                        }
                        if (isset($_SESSION['errormsg'])) {
                            echo '<p class="errormsg">' . $_SESSION['errormsg'] . '</p>';
                        }
                        // Clear the error messages from the session after displaying them
                        unset($_SESSION['errormessage']);
                        unset($_SESSION['errormsg']);
                    } else if (isset($_SESSION['successmsg'])) {
                        echo '<p class="successmsg">' . $_SESSION['successmsg'] . '</p>';
                        // Clear the success message from the session after displaying it
                        unset($_SESSION['successmsg']);
                    }
                ?>
            </div>
            <div class="card-body">
                <form action="actions/register" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btncustom" name="register">REGISTER</button>
                    </div>
                    <div id="text">return to the <span><a href="index" class="links">LOGIN PAGE</a></span></div>
                </form>
            </div>
        </div>
    </div>


<?php include("includes/footer.php");?>
</body>
</html>