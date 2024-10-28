<?php
    include 'partials/header.php';
    $user = $_SESSION['subAdmin'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <body>
    <div class="main-content ppd">



    <div class="container-fluid">
            <div class="row row-cols-4">
                <div class="col-md-10 col-12">
                    <a href="<?php echo SITEURL; ?>admin/subAdmin/addStaff.php"><button class="addButton">Add Staff</button></a>
                </div>

                <div class="col-md-10 col-12">
                    <div class="row">
                    <div class="col-lg-12 col-md-17">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Staff</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

            <tbody>

            <?php
            $sql = "SELECT * FROM staff WHERE shop_owner='$user'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $name = $row['staff_name'];
                    $designation = $row['designation'];
                    ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $designation; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/subAdmin/updateStaff.php?id=<?php echo $id; ?>"><button class="updatebtn">
  <span class="label">Update</span>
  <span class="icon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
  </span>
</button></a>
                        <a href="<?php echo SITEURL; ?>admin/subAdmin/deleteStaff.php?id=<?php echo $id; ?>" class="btn-danger">
<button class="deletebtn"><span class="text">Delete</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z">

</path></svg></span></button></a>
                    </td>
                </tr>                    
                    </tbody>
                    <?php
                }
            }
            else
            {
                ?>

                <tr>
                    <td colspan="6">
                        <div class="error">No Staff Added.</div>
                    </td>
                </tr>

                <?php
            }

            ?>


        </table>
    </div>
</div>
                </div>
               
            </div>

        </div>

    </div>

    </body>
    </html>
<?php
    include 'partials/footer.php';
?>