<?php
    include_once('../../config/conn.php');
?>
<link rel="stylesheet" href="/specsbazaar/css/style1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<section class="registration">
    <form action="supUserSearch.php" method="get" class="search-form">
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
                                            <th class="sppc">Username</th>
                                            <th class="sppc">emil</th>
                                            <th class="sppc">Contact</th>
                                            <th class="sppc">Address</th>
                                        </tr>
                                    </thead>

            <tbody>

            <?php
            $search = $_GET['search'];
            $sql = "SELECT * FROM users WHERE username LIKE '%$search%' OR email LIKE '%$search%' OR contact LIKE '%$search%' OR address LIKE '%$search%'";
            $sn=1;
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row= mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $address = $row['address'];
    ?>

                <tr>
                <td class="sppc"><?php echo $sn++; ?></td>
                    <td class="sppc"><?php echo $username ?></td>
                    <td class="sppc"><?php echo $email; ?></td>
                    <td class="sppc"><?php echo $contact; ?></td>
                    <td class="sppc"><?php echo $address;?></td>
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
                        <div class="error">No Users Found.</div>
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

<?php
    include_once('partials/footer.php');
?>