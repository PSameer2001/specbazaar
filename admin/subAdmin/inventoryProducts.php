<?php
    include_once('partials/header.php');
?>
<div class="main-content ppd">
    <div class="wrapper">
<a href="<?php echo SITEURL; ?>admin/subAdmin/addInventory.php"><button class="addButton">Add Inventory Product</button></a>
<form action="subInventorySearch.php" method="get" class="search-form">
        <input type="text" class="search-form" name="search" placeholder="search here...." />
        <button type="submit"><label for="search-box" class="fas fa-search"></label></button>
    </form>
<div class="row">
                    <div class="col-lg-12 col-md-17">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Inventory Products</h4>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>

            <tbody>

            <?php
            $user = $_SESSION['subAdmin'];
            $sql = "SELECT * FROM inventory WHERE publisher='$user'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $price = $row['price'];
                    ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>

                    <td>
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
                    <td><?php echo $price; ?></td>
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
                        <div class="error">Inventory Empty.</div>
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