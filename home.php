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

    <?php 
    $query = "SELECT * FROM `blogs` ORDER BY `id` ASC";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0){
        while ($row = mysqli_fetch_assoc($query_run)) {
        $timestamp = strtotime($row['datetime']);
        $formattedDate = date('jS \of F Y h:i:s A', $timestamp);
    ?>
        <div class="container blogcontainer">
            <div class="card blogcard">
                <div class="card-body">
                    <p class="blogtitle"><?php echo $row['title']; ?></p>
                    <p class="blogtext"><?php echo $row['content']; ?></p>
                    <p class="blogtext"><?php echo $formattedDate; ?></p>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-danger btnhomecustom" id="<?php echo $row['id']; ?>" onclick="deleteblog(<?php echo $row['id']; ?>);" name="delete">DELETE</button>
                    <button type="button" class="btn btn-success btnhomecustom" id="edit-btn-<?php echo $row['id']; ?>" onclick="editblog(<?php echo $row['id']; ?>);" name="edit">EDIT</button>
                </div>
            </div>
        </div>
    <?php  
            }
        } else {
            echo '<div class="alert alert-danger norecord"><em>No records were found.</em></div>';
        }
    ?>

    <div class="container">
        <div class="card blogcard">
            <div class="card-body">
                <button type="button" class="btn btn-primary btncreate" onclick="createblog();" name="create">CREATE NEW POST</button>
            </div>
        </div>
    </div>


    <script>
        function deleteblog(blogID) {
            if (confirm('Do you really want to delete this blog?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'actions/deleteblog.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert(xhr.responseText);
                        window.location.reload();
                    }
                };
                xhr.send('id=' + blogID); 
            }
        }

        function editblog(blogID) {
            window.location.href = "edit.php?id=" + blogID;
        }

        function createblog(){
            window.location.href = "create";
        }
    </script>


<?php include("includes/footer.php");?>
</body>
</html>