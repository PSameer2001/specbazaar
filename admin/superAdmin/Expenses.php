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

        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        
        if(isset($_SESSION['no-category-found']))
        {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if(isset($_SESSION['failed-remove']))
        {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }        

        ?>
         <a href="<?php echo SITEURL; ?>admin/superAdmin/addExpenses.php"><button class="addButton">Add Expenses</button></a>

        <br /> <br /> <br />

        <div class="row ">
                    <div class="col-lg-12 col-md-15">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Expenses</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>username</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Purpose</th>
                                            <th>Payment Mode</th>
                                            <th>Payment Remark</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

            <tbody>

        <?php
            $username = $_SESSION['superAdmin'];
            $sql = "SELECT * FROM expense WHERE username='$username'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $username = $row['username'];
                    $date = $row['date'];
                    $amount = $row['expense'];
                    $purpose = $row['purpose'];
                    $payment_mode = $row['payment_mode'];
                    $payment_remark = $row['payment_remark'];

                    ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $username; ?></td>

                    <td><?php echo $date; ?></td>
                    <td><?php echo $amount; ?></td>

                    <td><?php echo $purpose; ?></td>
                    <td><?php echo $payment_mode; ?></td>
                    <td><?php echo $payment_remark; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/superAdmin/updateExpense.php?id=<?php echo $id; ?>" ><button class="updatebtn">
  <span class="label">Update</span>
  <span class="icon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
  </span>
</button></a>
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
                        <div class="error">No Expenses Added.</div>
                    </td>
                </tr>

                <?php
            }

            ?>


        </table>
    </div>
</div>


<?php
    include_once('partials/footer.php')
?>