<?php
    include_once('partials/header.php');
?>
<div class="main-content ppd">
    <div class="wrapper">
<form action="supUserSearch.php" method="get" class="search-form">
    <input type="text"  class="search-form" name="search" placeholder="search here...."  />
    <button type="submit"><label for="search-box" class="fas fa-search"></label></button>
</form>
<div class="row">
                    <div class="col-lg-12 col-md-17">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Users</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Username</th>
                                            <th>email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>

            <tbody>

            <?php
            $sql = "SELECT * FROM users";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $address = $row['address'];
                    $membership_status = $row['gold_membership'];
                    ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <td><?php echo $username ?>
                    <?php if($membership_status == 'true'){ 
                        echo "<img src='../../images/ticket.png' width='100px'/>";
                    } ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $contact; ?></td>
                    <td><?php echo $address;?></td>
                    <td><a href="toggleMembership.php?id=<?php echo $id;?>"><button><?php if($membership_status == 'true'){ 
                        echo 'Remove Membership';
                    }
                    else{ 
                        echo 'Make Gold Member'; 
                    } ?></button></a></td>
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
                        <div class="error">No Users.</div>
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