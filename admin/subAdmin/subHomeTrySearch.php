<?php
    include_once('../../config/conn.php');
?>
<link rel="stylesheet" href="/specsbazaar/css/style1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<section class="registration">
        
<form action="subHomeTrySearch.php" method="get" class="search-form">
    <input type="text" class="search-form" name="search" placeholder="search here...." />
    <button type="submit"><label for="search-box" class="fas fa-search"></label></button>
</form>

<div class="signup-form-container1 ">

                <form>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th class="sppc">Serial No.</th>
                                            <th class="sppc">username</th>
                                            <th class="sppc">Description</th>
                                            <th class="sppc">Visited</th>
                                            <th class="sppc">Tester</th>
                                            <th class="sppc">Actions</th>
                                        </tr>
                                    </thead>

<?php
            $search = $_GET['search'];
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM home_try_on WHERE tester='$user_id' AND (username LIKE '%$search%' OR username LIKE '%$search%' OR email LIKE '%$search%' OR contact LIKE '%$search%')";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $username = $row['username'];
                    $description = $row['description'];
                    $visited = $row['visited'];
                    $tester_id = $row['tester'];
                    $sql2 = "SELECT * FROM subadmin WHERE id='$tester_id'";
                    $res2 = mysqli_query($conn,$sql2);
                    $count2 = mysqli_num_rows($res2);
                    if($count2>0){
                        $row2 = mysqli_fetch_assoc($res2);
                        $tester = $row2['username'];
                    }else{
                        $tester = 'No Tester Alloted';
                    }
?>

                <tbody>
                    <tr>
                        <td class="sppc"><?php echo $sn++; ?></td>
                        <td class="sppc"><?php echo $username; ?></td>
                        <td class="sppc"><?php echo $description; ?></td>
                        <td class="sppc"><?php echo $visited; ?></td>
                        <td class="sppc"><?php echo $tester ?></td>
                        <td class="sppc">
                        <a href="<?php echo SITEURL; ?>admin/superAdmin/updateHomeTry.php?id=<?php echo $id; ?>"><button type="button" class="updatebtn btn9">
  <span class="label">Update</span></button></a>
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
                        <div class="error">No Home Try On requests Found.</div>
                    </td>
                </tr>

<?php
            }

            ?>
       
         </table>
    </div>
</form>
</div>

</section>
