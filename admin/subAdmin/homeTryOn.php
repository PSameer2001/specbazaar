<?php
    include_once('partials/header.php');
?>
<div class="main-content ppd">
    <div class="wrapper">
    <form action="subHomeTrySearch.php" method="get"  class="search-form">
    <input type="text" class="search-form" name="search" placeholder="search here...."  />
    <button type="submit"><label for="search-box" class="fas fa-search"></label></button>
</form>
            <div class="row ">
                    <div class="col-lg-12 col-md-16">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Home Try On</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>username</th>
                                            <th>whatsapp contact</th>
                                            <th>Description</th>
                                            <th>Visited</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

<?php
            $user = $_SESSION['subAdmin'];
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM home_try_on WHERE tester=$user_id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $username = $row['username'];
                    $whatsapp_contact = $row['whatsapp_contact'];
                    $description = $row['description'];
                    $visited = $row['visited'];
                    $address = $row['address'];
?>

                <tbody>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $whatsapp_contact; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $visited; ?></td>
                        <td>
                        <a href="<?php echo SITEURL; ?>admin/subAdmin/updateHomeTryOn.php?id=<?php echo $id; ?>"><button class="updatebtn">
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
                        <div class="error">No Home Try On requests at the moment.</div>
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