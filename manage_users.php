<?php require("config/Database.php"); ?>
<?php require("check_permission.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php"); ?>
<?php
    
    // Query statement
    $getUsersQuery ="SELECT * FROM users";

    // Get result
    $result = mysqli_query($conn, $getUsersQuery);

    // Fetch data
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Delete
    if(isset($_POST["submit"])) {
        $getCurrentUserQuery = "SELECT user_name FROM users WHERE user_id=".$_POST["id"];
        $currentUserResult = mysqli_query($conn, $getCurrentUserQuery);
        $currentUserName = mysqli_fetch_assoc($currentUserResult);
        if ($_SESSION['username'] != $currentUserName["user_name"]) {
            $deleteQuery = "DELETE FROM users WHERE user_id=".$_POST["id"];
            mysqli_query($conn, $deleteQuery);
            $_SESSION['message'] =  "Users deleted successfully";
            header("Location: manage_users.php");
            die();
        } else {
            $_SESSION['message'] =  "This user is currently logged in!";
            header("Location: manage_users.php");
            die();
        }
        
    }
?>


<div class="container">
    <h1 class="title">Manage Users</h1>
    <?php include("info_message.php"); ?>
    <div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
            <?php foreach($users as $user) : ?>
                <?php echo "<tr>"; ?>
                <?php echo "<td>" .$user["user_id"]. "</td>"; ?>
                <?php echo "<td>" .$user["user_name"]. "</td>"; ?>
                <?php echo "<td>" .$user["user_email"]. "</td>"; ?>
                <?php if($user["user_role"] == 1) {
                    echo "<td>Admin</td>";
                } else if($user["user_role"] == 2) {
                    echo "<td>Customer</td>";
                } ?>
                <td><a class="btn btn-primary" href="edit_user.php?id=<?php echo $user["user_id"]; ?>" role="button">Edit</button></td>
                <td>
                <button class="btn btn-danger" type="submit" onclick="showModal(<?php echo $user["user_id"]; ?>)">Delete
                </td>
                <?php echo "</tr>"; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <div>
        <a href="add_user.php">
            <button class="btn btn-primary">Add user</button>
        </a>
    </div>
</div>
<dialog id="myDialog">
    <p>Delete this user ?</p>
    <form action="manage_users.php" method="post">
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