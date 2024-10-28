<?php
    include 'partials/header.php';
    $user = $_SESSION['superAdmin'];
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
                    <h3>Shop Name : <?php echo $_SESSION['branch_name']; ?></h3>
                    <p>owner name : <?php echo $_SESSION['superAdmin']; ?></p>
                    <p>contact number : <?php echo $_SESSION['sup_contact']; ?></p>
                    <p>address : <?php echo $_SESSION['address']; ?></p>
                </div>


                <div class="col-md-12 col-12">
                    <hr>
                </div>

                <div class="col-md-4 mx-auto" id="bux" >
                    <h3>Pending Task</h3>
                    <p>Pending Order Value:  </p>
                    <?php
                        $sql3 = "SELECT * FROM orders WHERE status='ordered' AND publisher='$user'";
                        $res3 = mysqli_query($conn,$sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>
                    <p>Pending Orders: <?php echo $count3; ?> </p>
                    <p>Pending Balance Collection:  </p>
                    <p>Pending Purchase Count:  </p>
                </div>

        
                <div class="col-md-4 mx-auto" id="bux">
                    <h3>Today's Data</h3>
                    <?php
                        $sql6 = "SELECT SUM(total) AS Total FROM orders WHERE status='ordered' AND order_date='$date'";
                        $res6 = mysqli_query($conn,$sql6);
                        $row6 = mysqli_fetch_assoc($res6);
                        $total_revenue = $row6['Total'];
                        $zero=0;
                    ?>
                    <p>Payment Collection: &#8377;<?php echo $zero+$total_revenue ?></p>
                    <?php
                    $sql7 = "SELECT SUM(expense) as Expense FROM expense WHERE username='$user' AND expense_date='$date'";
                    $res7 = mysqli_query($conn,$sql7);
                    $row7 = mysqli_fetch_assoc($res7);
                    $count7 = mysqli_num_rows($res7);
                    $expense = $row7['Expense'];
                    ?>
                    <p>Expenses: <?php if($count7>0){echo $expense;}else{echo 'Add Expense To See Results';}?></p>
                    <?php
                    $sql8 = "SELECT * FROM eye_test WHERE visited='No'";
                    $res8 = mysqli_query($conn,$sql8);
                    $count8 = mysqli_num_rows($res8);
                    ?>
                    <p>Eye Testing: <?php echo $count8; ?> </p>
                    <p>Visitors:  </p>
                    <?php
                        $sql9 = "SELECT SUM(total) AS Total FROM orders WHERE order_date='$date' AND publisher='$user'";
                        $res9 = mysqli_query($conn,$sql9);
                        $row9 = mysqli_fetch_assoc($res9);
                        $count9 = mysqli_num_rows($res9);
                        $total_revenue = $row9['Total'];
                        $sql10 = "SELECT * FROM orders WHERE order_date='$date'";
                        $res10 = mysqli_query($conn,$sql10);
                        $count10 = mysqli_num_rows($res10);
                        if($count10>0){
                            $avg = $total_revenue/$count10;
                        }else{
                            $avg = 0;
                        }
                    ?>
                    <p>Average Sale Value: <?php echo $avg; ?> </p>
                    <?php
                        $sql11 = "SELECT * FROM orders";
                        $res11 = mysqli_query($conn,$sql11);
                        $count11 = mysqli_num_rows($res11);
                    ?>
                    <p>Number of Bills: <?php echo $count11; ?> </p>
                    <p>New Orders: <?php echo $count10; ?> </p>
                    <?php
                        $profit = $total_revenue-$expense;
                    ?>
                    <p>Profit/Loss: <?php echo $profit; ?> </p>
                </div>

                <div class="col-md-4 mx-auto" id="bux">
                    <h3>This Month's Data</h3>
                    <?php
                        $sql12 = "SELECT SUM(total) AS Total FROM orders WHERE MONTH(order_date)='$month' AND YEAR(order_date)='$year' AND publisher='$user'";
                        $res12 = mysqli_query($conn,$sql12);
                        $row12 = mysqli_fetch_assoc($res12);
                        $count12 = mysqli_num_rows($res12);
                        $total_monthly_revenue = $row12['Total'];
                    ?>
                    <p>Total Sales: <?php echo $total_monthly_revenue; ?> </p>
                    <?php
                        $sql13 = "SELECT SUM(expense) as Expense FROM expense WHERE MONTH(expense_date)='$month' AND YEAR(expense_date)='$year' AND username='$user'";
                        $res13 = mysqli_query($conn,$sql13);
                        $row13 = mysqli_fetch_assoc($res13);
                        $count13 = mysqli_num_rows($res13);
                        $monthly_expense = $row13['Expense'];
                    ?>
                    <p>Total Expenses: <?php echo $monthly_expense; ?> </p>
                    <?php
                        $sql14 = "SELECT * FROM eye_test WHERE MONTH(date)='$month' AND YEAR(date)='$year' AND tester='$user'";
                        $res14 = mysqli_query($conn,$sql14);
                        $count14 = mysqli_num_rows($res14);
                    ?>
                    <p>Total Eye Testings: <?php echo $count14; ?> </p>
                    <p>Total Visitors:  </p>
                    <?php
                        $monthly_avg_sale = $total_monthly_revenue/$count12;
                    ?>
                    <p>Average Sale Value: <?php echo $monthly_avg_sale; ?> </p>
                    <?php
                        $sql15 = "SELECT * FROM orders WHERE MONTH(order_date)='$month' AND YEAR(order_date)='$year' AND publisher='$user'";
                        $res15 = mysqli_query($conn,$sql15);
                        $count15 = mysqli_num_rows($res15);
                    ?>
                    <p>Number of Bills: <?php echo $count15; ?> </p>
                    <?php
                        $monthly_profit = $total_monthly_revenue - $monthly_expense;
                    ?>
                    <p>Total Profit/Loss: <?php echo $monthly_profit; ?> </p>
                </div>
            </div>

        </div>

    </div>

    </body>
    </html>
<?php
    include 'partials/footer.php';
?>