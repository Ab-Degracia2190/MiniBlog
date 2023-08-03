<?php 
    if(empty($_SESSION['id'])) { ?>
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand">MiniBlog</a>
                <form class="d-flex">
                    <button class="btn btnlogin" onclick="loginpage();" type="button">Login</button>
                </form>
            </div>
        </nav>
    <?php } else { ?>
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand">MiniBlog</a>
                <form class="d-flex">
                    <button class="btn btnlogin" type="button">Hi <?php echo $_SESSION['username']?>!</button>
                    <button class="btn btnlogin" onclick="homepage();" type="button">Home</button>
                    <button class="btn btnlogin" onclick="logout();" type="button">Logout</button>
                </form>
            </div>
        </nav>    
<?php } ?>


<script>
    function loginpage(){
        window.location.href = 'index';
    }

    function homepage(){
        window.location.href = 'home';
    }

    function logout() {
        window.location.href = 'logout.php?logoutMessage=Currently logged out.';
    }
</script>
