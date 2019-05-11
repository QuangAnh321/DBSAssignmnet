<?php
    //info message
    if (isset($_SESSION['message'])) {
        ?>
        <div class="alert alert-info text-center" style="float:inherit">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php
        unset($_SESSION['message']);
    }
    ?>