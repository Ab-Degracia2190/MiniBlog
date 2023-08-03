<?php 
include("includes/header.php");

if(empty($_SESSION['id'])){
    header('Location: index');
}

$blogID = $_GET['id'];


$edit = "SELECT * FROM `blogs` WHERE `id` = '$blogID'";
$result = mysqli_query($conn, $edit);
if (!$result || mysqli_num_rows($result) === 0) {
    header('Location: home');
    exit;
}

$newrow = mysqli_fetch_assoc($result);
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
        <p class="blogtitle">Edit Post - Post Title</p>                
        <form action="actions/editblog.php?id=<?php echo $blogID; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $blogID; ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="newtitle" value="<?php echo $newrow['title']; ?>">
                <input type="text" class="content" name="newcontent" value="<?php echo $newrow['content']; ?>">
            </div>
            <button type="submit" class="btn btnpost" name="editblog">SAVE</button>
        </form>
    </div>

<?php include("includes/footer.php");?>
</body>
</html>