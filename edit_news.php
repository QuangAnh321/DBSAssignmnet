<?php require("config/Database.php"); ?>
<?php
// Show code error (if any)
// Get id
$id = mysqli_real_escape_string($conn, $_GET["id"]);
    
// Query statement
$query ="SELECT * FROM news where news_id =".$id;

// Get the news
$result = mysqli_query($conn, $query);

// Fetch data
$news = mysqli_fetch_assoc($result);


if (isset($_POST["submit"]) && isset($_FILES['image'])) {
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $body = mysqli_real_escape_string($conn, $_POST["body"]);

        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        
        $extensions= array("jpeg","jpg","png");
      
 
        if(in_array($file_ext,$extensions)=== false){
            echo "extension not allowed";
        } else if ($file_size > 2097152) {
            echo "File size must be lower than 2 MB";
        } else {
            $path = "image_news/";
            $localPath = $path.$file_name;
            if (is_dir($path)) {
                @mkdir($path, 0777, true);
            }
            move_uploaded_file($file_tmp, $localPath);
            $updateQuery = "UPDATE news SET news_title = '$title', news_body = '$body', news_image_dir = '$localPath' WHERE news_id =".$id;
            if (mysqli_query($conn, $updateQuery)) {
                $_SESSION['message'] = "New post edited successfully";
                header('location: edit_news.php');
            } else {
                $_SESSION['message'] = "Error: ". mysqli_error($conn);
            }
        }
    }
?>


<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php"); ?>
<div class="container">
    <h2 class="title">Edit News</h2>
    <?php include("info_message.php"); ?>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" name="title" value="<?php echo $news["news_title"]; ?>">
            </div>
            <div class="form-group">
                <label>Content:</label>
                <textarea rows="4" class="form-control" name="body"><?php echo $news["news_body"]; ?></textarea>
            </div>
            <div class="form-group">
                <label>File:</label>
                <br>
                <p>Please reselect your old image if you do not want to change it</p>
                <input type="file" class="form-control-file" name="image">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    <?php include("inc/footer.php"); ?>
    <!-- use latter 
    <script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>