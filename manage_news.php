<?php require("config/Database.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php"); ?>
<?php
    
    // Query statement
    $getNewsQuery ="SELECT * FROM news";

    // Get result
    $result = mysqli_query($conn, $getNewsQuery);

    // Fetch data
    $news = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Delete news
    if(isset($_POST["submit"])) {
        $deleteQuery = "DELETE FROM news WHERE news_id=".$_POST["id"];
        mysqli_query($conn, $deleteQuery);
        $_SESSION['message'] =  "News deleted successfully";
        header("Location: manage_news.php");
        die();
    }
?>


<div class="container">
    <h1 class="title">Manage news</h1>
    <?php include("info_message.php"); ?>
    <div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
            <?php foreach($news as $new) : ?>
                <?php echo "<tr>"; ?>
                <?php echo "<td>" .$new["news_id"]. "</td>"; ?>
                <?php echo "<td>" .$new["news_title"]. "</td>"; ?>
                <?php echo "<td>" .$new["created_at"]. "</td>"; ?>
                <?php echo "<td>" .$new["updated_at"]. "</td>"; ?>
                <td><a class="btn btn-primary" href="edit_news.php?id=<?php echo $new["news_id"]; ?>" role="button">Edit</button></td>
                <td>
                <button class="btn btn-danger" type="submit" onclick="showModal(<?php echo $new["news_id"]; ?>)">Delete
                </td>
                <?php echo "</tr>"; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <div>
        <a href="add_news.php">
            <button class="btn btn-primary">Add news</button>
        </a>
    </div>
</div>
<dialog id="myDialog">
    <p>Delete this news ?</p>
    <form action="manage_news.php" method="post">
        <input type="hidden" id="idField" value="" name="id">
        <button class="btn btn-danger" type="submit" name="submit">Delete</button>
        <button class="btn btn-light" onclick="hideModal()">Cancel</button>
    </form>
</dialog>
   
<script>
    function showModal(id) { 
        document.getElementById("myDialog").showModal();
        document.getElementById("idField").value = id;
    } 
    function hideModal() { 
        document.getElementById("myDialog").close(); 
    } 
</script>



<?php include("inc/footer.php"); ?>