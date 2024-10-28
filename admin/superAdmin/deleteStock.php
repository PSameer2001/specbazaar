<?php
    include_once('partials/header.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM stock_records WHERE id= $id ";
    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='success'>Stock deleted successfully.</div>";
        ?>
        <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/stockRecords.php'</script>;
        <?php
    }
    
    else
    {
        $_SESSION['delete'] = " <div class='error'>Failed to delete Stock. Try again later</div>";
        ?>
        <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/stockRecords.php'</script>;
        <?php
    }
?>