<?php
    include_once('partials/header.php');
?>
<div class="main-content ppd">
    <div class="wrapper">
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['change-pwd']))
        {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }
        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        ?>
        <a href="<?php echo SITEURL; ?>admin/superAdmin/addSuperAdmin.php"><button class="addButton">Add Super Admin</button></a>
        <br><br><br>
        <div class="row ">
                    <div class="col-lg-12 col-md-15">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Super Admins</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Username</th>
                                            <th>Branch Name</th>
                                            <th>Branch Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
            <tbody>
        <?php

            $sql = "SELECT * FROM superadmin";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $UserName = $row['username'];
                    $branch_name = $row['branch_name'];
                    $branch_image = $row['branch_image'];
                    ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $UserName; ?></td>
                    <td><?php echo $branch_name ?></td>
                    <td><img src='<?php echo SITEURL ?>images/branch/<?php echo $branch_image?>' width='100px'></td>
                    <td>
                        <a href="<?php echo SITEURL;?>admin/superAdmin/changeSuperAdminPassword.php?id=<?php echo $id; ?>"><button class="btn9">Change Password</button></a>
                        <a href="<?php echo SITEURL; ?>admin/superAdmin/updateSuperAdmin.php?id=<?php echo $id; ?>"><button class="updatebtn">
  <span class="label">Update</span>
  <span class="icon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
  </span>
</button></a>
                        <a href="<?php echo SITEURL; ?>admin/superAdmin/deleteSuperAdmin.php?id=<?php echo $id;?>" class="btn-danger">
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
                        <div class="error">No Super-Admins Added.</div>
                    </td>
                </tr>

                <?php
            }

            ?>


        </table>
    </div>
</div>

<?php
    include_once('partials/footer.php');
?>