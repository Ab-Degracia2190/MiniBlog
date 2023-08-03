<?php 
include("includes/header.php");

if(empty($_SESSION['id'])){
    header('Location: index');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
        <?php include("includes/navbar.php");?>
    <!-- navbar end -->
    <div class="container blogcontainer">
        <p class="blogtitle">Create a Post!</p>                
        <form action="actions/createblog.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Enter Title">
                <input type="text" class="content" name="content" placeholder="Enter Content">
            </div>
            <button type="submit" class="btn btnpost" name="createblog">POST</button>
        </form>
    </div>

<?php include("includes/footer.php");?>
</body>
</html>