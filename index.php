<?php include("includes/header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- navbar -->
        <?php include("includes/navbar.php");?>
    <!-- navbar end -->
    
    <div class="container">
        <div class="card">
            <div class="card-header">
            <p>Login</p>
            </div>
            <div class="card-body">
                <form action="actions/login.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Enter Email">
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btncustom" name="login">LOGIN</button>
                        <button type="button" class="btn btncustom" onclick="registrationpage();" name="register">REGISTER</button>
                    </div>
                    <div class="messages" id="text">
                        <?php
                            if (isset($_SESSION['errormessage']) || isset($_SESSION['errormsg'])) {
                                if (isset($_SESSION['errormessage'])) {
                                    echo '<p class="errormsg">' . $_SESSION['errormessage'] . '</p>';
                                }
                                if (isset($_SESSION['errormsg'])) {
                                    echo '<p class="errormsg">' . $_SESSION['errormsg'] . '</p>';
                                }
                                unset($_SESSION['errormessage']);
                                unset($_SESSION['errormsg']);
                            } else if (isset($_SESSION['successmsg'])) {
                                echo '<p class="successmsg">' . $_SESSION['successmsg'] . '</p>';
                                unset($_SESSION['successmsg']);
                            } 
                        ?>
                    </div>
                    <div id="logoutMessage">
                        <?php
                        if (isset($_GET['logoutMessage'])) {
                            echo $_GET['logoutMessage'];
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function registrationpage(){
            window.location.href = 'registration';
        }
    </script>



<?php include("includes/footer.php");?>
</body>
</html>