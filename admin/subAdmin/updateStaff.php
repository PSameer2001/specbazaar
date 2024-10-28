<?php include_once('partials/header.php'); ?>

<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM staff WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $name = $row2['staff_name'];
        $designation = $row2['designation'];
    }
    else
    {
        ?>
        <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/employees.php';</script>
        <?php
    }
?>

<link rel="stylesheet" href="/specsbazaar/css/style1.css">

<div class="main-content">
    <div class="wrapper">

     <section class="registration">

        <div class="signup-form-container">

        <form action="" method="POST" enctype="multipart/form-data">
        <h2>Update Staff</h2>
        <table class="tbl-30">

            <tr>
                <td><p>Staff Name :  </p></td>
                <td>
                    <input type="text" name="staff_name" value="<?php echo $name; ?>">
                </td>
            </tr>

            <tr>
                <td><p>Designation :  </p></td>
                <td>
                    <input type="text" name="designation" value="<?php echo $designation; ?>">
                </td>
            </tr>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="owner" value="<?php echo $owner; ?>">

        </table>

         <input type="submit" name="submit" value="Update Staff" class="btn-secondary btn">
        
        </form>

    </div>

</section>

        <?php
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $name = $_POST['staff_name'];
                $designation = $_POST['designation'];
                $owner = $_POST['owner'];

                
                $sql3 = "UPDATE staff SET 
                    staff_name = '$name',
                    designation = '$designation'
                    WHERE id=$id
                ";
                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'>product Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/employees.php';</script>
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update product.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/employees.php';</script>
                    <?php
                }
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>

















