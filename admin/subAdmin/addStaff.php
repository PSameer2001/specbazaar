<?php
    include ('../../config/conn.php');
    $user = $_SESSION['subAdmin'];
?>

<link rel="stylesheet" href="/specsbazaar/css/style1.css">
<div class="main-content">
    <div class="wrapper">
        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <section class="registration">

        <div class="signup-form-container">

        <form action="" method="POST" enctype="multipart/form-data">
                
                <div class="contain">
                    <p>Staff Name:  </p>
                    <input type="text" name="staff_name" placeholder="Enter Staff's Name">
                </div>

                <div class="contain">
                    <p>Mobile Number: </p>
                    <input type="text" name="designation" placeholder="Enter Mobile Number">
                </div>

                <div class="contain">
                    <p>Designation: </p>
                    <input type="text" name="designation" placeholder="Designation of Employee">
                </div>
                </table>

                        <input type="submit" name="submit" value="Add Staff" class="addButton btn">

        </form>

        </div>

        </section>

        
        <?php 

            if(isset($_POST['submit']))
            {
                $name = $_POST['staff_name'];
                $designation = $_POST['designation'];
                $owner = $_SESSION['subAdmin'];
                
                $sql2 = "INSERT INTO staff SET 
                    staff_name = '$name',
                    designation = '$designation',
                    shop_owner = '$owner'
                ";

                $res2 = mysqli_query($conn, $sql2);
                if($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>Staff Added Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/employees.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to Add Staff.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/employees.php'</script>;
                    <?php
                }   
            }

        ?>


    </div>
</div>