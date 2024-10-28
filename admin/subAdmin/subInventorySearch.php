<?php
    include_once('../../config/conn.php');
?>
<link rel="stylesheet" href="/specsbazaar/css/style1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<section class="registration">
    <form action="subInventorySearch.php" method="get" class="search-form">
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
                                            <th class="sppc">Product Name</th>
                                            <th class="sppc">Image</th>
                                            <th class="sppc">Price</th>
                                            <th class="sppc">Actions</th>
                                        </tr>
                                    </thead>

            <tbody>

            <?php
            $search = $_GET['search'];
            $user = $_SESSION['subAdmin'];
            $sql = "SELECT * FROM inventory WHERE publisher='$user' AND (title LIKE '%$search%' OR description LIKE '%$search%' OR price LIKE '%$search%' OR brand LIKE '%$search%' OR color LIKE '%$search%')";
            $sn=1;
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row= mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $product_code = $row['product_code'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $image_name=$row['image_name'];
    ?>

                <tr>
                    <td class="sppc"><?php echo $sn++; ?></td>
                    <td class="sppc"><?php echo ("($product_code)".$title); ?></td>

                    <td class="sppc">
                        <?php  
                        if($image_name!="")
                        {
                            ?>

                            <img src="<?php echo SITEURL; ?>images/inventory/<?php echo $image_name; ?>" width="100px">
                            
                            <?php
                        }
                        else
                        {
                            echo "<div class='error'>Image Not Added</div>";
                        }

                        ?>
                    </td>
                    <td class="sppc"><?php echo $price; ?></td>
                    <td class="sppc">
                        <a href="<?php echo SITEURL; ?>admin/subAdmin/updateInventoryProduct.php?id=<?php echo $id; ?>"><button type="button" class="updatebtn btn9">
  <span class="label">Update</span></button></a>

                        <a href="<?php echo SITEURL; ?>admin/subAdmin/deleteInventoryProduct.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">
<button type="button" class="deletebtn btn9"><span class="text">Delete</span></button></a>
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
                        <div class="error">No Product Found.</div>
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