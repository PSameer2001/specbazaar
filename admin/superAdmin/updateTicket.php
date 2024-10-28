<?php include_once('../../config/conn.php'); ?>
<link rel="stylesheet" href="/specsbazaar/css/style.css">
<div class="main-content">
    <div class="wrapper">


        <?php 
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM contact WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $username = $row['username'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $subject = $row['subject'];
                    $message = $row['message'];
                    $solved = $row['solved'];
                }
                else
                {
                    $_SESSION['no-coupon-found'] = "<div class='error'>Data not Found.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Ticket.php'</script>;
                    <?php
                }
 
            }
            else
            {
                ?>
                <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Ticket.php'</script>;
                <?php
            }
        
        ?>

     <section class="registration">

     <div class="signup-form-container">
        <form action="" method="POST">
            <h3>Home Try On</h3>
            <table class="tbl-30">
                <tr>
                    <td><p>Username:  </p></td>
                    <td>
                        <p><?php echo $username ?></p>
                    </td>
                </tr>

                <tr>
                    <td><p>Email:  </p></td>
                    <td>
                        <p><?php echo $email ?></p>
                    </td>
                </tr>
                <tr>
                <td><p>Contact </p></td>
                    <td>
                        <p><?php echo $contact ?></p>
                    </td>
                </tr>

                <tr>
                    <td><p>subject:  </p></td>
                    <td>
                        <p><?php echo $subject ?></p>
                    </td>
                </tr>

                <tr>
                    <td><p>Message:  </p></td>
                    <td><p><?php echo $message ?></p></td>
                </tr>

                <tr>
                <td><p>Solved Query:  </p></td>
                <td>
                    <input <?php if($solved=="Yes") {echo "checked";} ?> type="radio" name="solved" id="cmpo" value="Yes"> Yes 
                    <input <?php if($solved=="No") {echo "checked";} ?> type="radio" name="solved" id="cmpo" value="No"> No 
                </td>
                </tr>

                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                    </td>
                </tr>
                    </table>
                        <input type="submit" name="submit" value="UPDATE" class="addButton btn">

            </form>

        </div>

    </section>
    

        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $solved = $_POST['solved'];

                $sql2 = "UPDATE contact SET 
                    solved = '$solved'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Ticket.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Ticket.php'</script>;
                    <?php
                }

            }
        
        ?>

    </div>
</div>