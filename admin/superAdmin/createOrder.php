<?php
    include_once('../../config/conn.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link rel="stylesheet" href="/specsbazaar/css/jdstyle.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        table,
        th,
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="container" style="background-color: #DFFBCA; border:2.3px solid #ABCBC1;">
        <!-- first section -->
        <div class="input_label_container">
            <label class="label_name"><span class="astrix">*</span>Branch Name :</label>
            <select id="Branch_name" style="margin-right: 3rem; width: 20%;">
                <option value="product detail">-- Select Branch Name --</option>
                <?php 
                    $sql = "SELECT * FROM subadmin";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if ($count>1){
                        while($row = mysqli_fetch_assoc($res)){
                            $branch_id = $row['id'];
                            $branch = $row['branch_name'];
                            ?>
                                <option value="<?php echo $branch_id; ?>"><?php echo $branch; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>

            <label class="label_name">Referral Code Or Customer Mobile Number :</label>
            <input type="text" class="input_name" name="cust_contact" style="width: 18%;">
        </div>
        <br>
        <br>
        <div class="input_label_container">
            <label class="label_name">Order Number :</label>
            <input type="text" class="input_name" name="order_num" style="width: 19.5%; margin-right: 2.3rem;">

            <label class="label_name">Date :</label>
            <input type="date" name="order_date" class="input_name">

            <label class="label_name">Delivery Date :</label>
            <input type="date" name="delivery_date" class="input_name">
        </div>
        <br>
        <br>
        <div class="input_label_container">
            <label class="label_name" style="margin-left: 1.72rem;"><span class="astrix">*</span>Mobile No.1 :</label>
            <input type="text" class="input_name" style="margin-right: 3rem;">

            <label class="label_name"><span class="astrix">*</span>Customer Name :</label>
            <input type="text" class="input_name" style="width: 19.5%;">

        </div>
        <br>
        <br>
        <div class="input_label_container">
            <label class="label_name" style="margin-left: 4.5rem;">Email :</label>
            <input type="text" class="input_name" name="cust_email" style="width: 25%;">

            <label class="label_name">Sales Person :</label>
            <select id="Branch_name" style="width: 15%;">
                <option value="product detail">Sales Person</option>
                <?php
                    $sql2 = "SELECT * FROM staff";
                    $res2 = mysqli_query($conn,$sql2);
                    $count2 = mysqli_num_rows($res2);
                    if($count2>0){
                        while($row = mysqli_fetch_assoc($res2)){
                            $name = $row['staff_name'];
                            ?>
                                <option value="product detail"><?php echo $name; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>

        </div>
        <br>
        <br>
        <div class="input_label_container">
            <label class="label_name">Anniversary Date :</label>
            <input type="date" class="input_name" style="margin-right: 11rem;">

            <label class="label_name">Date of Birth :</label>
            <input type="date" class="input_name">
        </div>
        <br>
        <br>
        <div class="input_label_container">
            <label class="label_name">Customer Category:</label>
            <input type="text" class="input_name" style="width: 19%;">

            <label class="label_name">Gender :</label>
            <input type="radio" name="fav_language" value="Male">
            <label for="Male" style="margin-right: 0.8rem;">Male</label>
            <input type="radio" name="fav_language" value="Female">
            <label for="Female" style="margin-right: 0.8rem;" >Female</label>
            <input type="radio" name="fav_language" value="Other">
            <label for="Other" style="margin-right: 0.8rem;">other</label>
        </div>
        <br>
        <br>
        <div class="input_label_container">
            <label class="label_name">Address Line-1:</label>
            <input type="text" class="input_name" style="width: 51%;">
        </div>
        <br>
        <br>
        <div class="input_label_container">
            <label class="label_name" id="Customer_notes">Customer Notes:</label>
            <textarea name="" id="textarea_for_Customer_notes" cols="0" rows="5" style="width: 51%;"></textarea>
        </div>
        <br>
        <div class="input_label_container">
            <label class="label_name">Tax Rule: </label>
            <input type="radio" name="fav_languag" value="Not Applicable" >
            <label for="Not Applicable" style="margin-right: 2rem;">Not Applicable</label>
            <input type="radio" name="fav_languag" value="Include" >
            <label for="Include" style="margin-right: 2rem;">Include</label>
            <input type="radio" name="fav_languag" value="Exclude" >
            <label for="Exclude" style="margin-right: 2rem;">Exclude</label>
            
            <label class="label_name">Tax Ledger: </label>
            <select id="Branch_name">
                <option value="product detail">Select Text Ledger</option>
                <option value="?">?</option>
                <option value="?">?</option>
                <option value="?">?</option>
            </select>

        </div>

        <!-- table -->

        <div style="width: 101%; overflow: auto; margin-top: 3rem;">
            <table id="productsTable" class="table table-bordered">
                <tr>
                    <th scope="col" class="text-white">#</th>
                    <th scope="col" class="text-white">Barcode</th>
                    <th scope="col" class="text-white">Products</th>
                    <th scope="col" class="text-white">Product code</th>
                    <th scope="col" class="text-white">Description</th>
                    <th scope="col" class="text-white">HSN/SAC<br>Code</th>
                    <th scope="col" class="text-white">GST%</th>
                    <th scope="col" class="text-white" colspan="2">Item Discount</th>
                    <th scope="col" class="text-white">Other Discount</th>
                    <th scope="col" class="text-white" style="width:10%;">Price</th>
                    <th scope="col" class="text-white" style="width:2% ;">%</th>
                </tr>
                <tr>
                    <th class="text-white">1</th>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <select id="mySelect" onchange="myFunction()">
                            <option value="product detail">Select Product Type</option>
                            <option value="id01">Frame</option>
                            <option value="id02">Lens</option>
                            <option value="id03">Repair</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><textarea name="" id="" cols="200" rows="1" style="width:98%; margin-top: 4px;"></textarea></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 75% ;">%</td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <div class="percentage_icon">
                        <img src="/specsbazaar/images/jd/percentage-percent-svgrepo-com.svg" alt="" class="table_percentage_icon">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="text-white">2</th>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <select id="mySelect2" onchange="myFunction2()">
                            <option value="product detail">Select Product Type</option>
                            <option value="id01">Frame</option>
                            <option value="id02">Lens</option>
                            <option value="id03">Repair</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><textarea name="" id="" cols="200" rows="1" style="width:98%; margin-top: 4px;"></textarea></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 75% ;">%</td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <div class="percentage_icon">
                        <img src="/specsbazaar/images/jd/percentage-percent-svgrepo-com.svg" alt="" class="table_percentage_icon">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="text-white">3</th>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <select id="mySelect3" onchange="myFunction3()">
                            <option value="product detail">Select Product Type</option>
                            <option value="id01">Frame</option>
                            <option value="id02">Lens</option>
                            <option value="id03">Repair</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><textarea name="" id="" cols="200" rows="1" style="width:98%; margin-top: 4px;"></textarea></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 75% ;">%</td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <div class="percentage_icon">
                        <img src="/specsbazaar/images/jd/percentage-percent-svgrepo-com.svg" alt="" class="table_percentage_icon">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="text-white">4</th>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <select id="mySelect4" onchange="myFunction4()">
                            <option value="product detail">Select Product Type</option>
                            <option value="id01">Frame</option>
                            <option value="id02">Lens</option>
                            <option value="id03">Repair</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><textarea name="" id="" cols="200" rows="1" style="width:98%; margin-top: 4px;"></textarea></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 75% ;">%</td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <div class="percentage_icon">
                        <img src="/specsbazaar/images/jd/percentage-percent-svgrepo-com.svg" alt="" class="table_percentage_icon">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="text-white">5</th>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <select id="mySelect5" onchange="myFunction5()">
                            <option value="product detail">Select Product Type</option>
                            <option value="id01">Frame</option>
                            <option value="id02">Lens</option>
                            <option value="id03">Repair</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><textarea name="" id="" cols="200" rows="1" style="width:98%; margin-top: 4px;"></textarea></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 75% ;">%</td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <div class="percentage_icon">
                        <img src="/specsbazaar/images/jd/percentage-percent-svgrepo-com.svg" alt="" class="table_percentage_icon">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="text-white">6</th>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <select id="mySelect6" onchange="myFunction6()">
                            <option value="product detail">Select Product Type</option>
                            <option value="id01">Frame</option>
                            <option value="id02">Lens</option>
                            <option value="id03">Repair</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><textarea name="" id="" cols="200" rows="1" style="width:98%; margin-top: 4px;"></textarea></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 75% ;">%</td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <div class="percentage_icon">
                        <img src="/specsbazaar/images/jd/percentage-percent-svgrepo-com.svg" alt="" class="table_percentage_icon">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="text-white">7</th>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <select id="mySelect7" onchange="myFunction7()">
                            <option value="product detail">Select Product Type</option>
                            <option value="id01">Frame</option>
                            <option value="id02">Lens</option>
                            <option value="id03">Repair</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><textarea name="" id="" cols="200" rows="1" style="width:98%; margin-top: 4px;"></textarea></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 75% ;">%</td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <div class="percentage_icon">
                        <img src="/specsbazaar/images/jd/percentage-percent-svgrepo-com.svg" alt="" class="table_percentage_icon">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="text-white">8</th>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <select id="mySelect8" onchange="myFunction8()">
                            <option value="product detail">Select Product Type</option>
                            <option value="id01">Frame</option>
                            <option value="id02">Lens</option>
                            <option value="id03">Repair</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><textarea name="" id="" cols="200" rows="1" style="width:98%; margin-top: 4px;"></textarea></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 75% ;">%</td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <div class="percentage_icon">
                        <img src="/specsbazaar/images/jd/percentage-percent-svgrepo-com.svg" alt="" class="table_percentage_icon">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="text-white">9</th>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <select id="mySelect9" onchange="myFunction9()">
                            <option value="product detail">Select Product Type</option>
                            <option value="id01">Frame</option>
                            <option value="id02">Lens</option>
                            <option value="id03">Repair</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><textarea name="" id="" cols="200" rows="1" style="width:98%; margin-top: 4px;"></textarea></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 75% ;">%</td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <div class="percentage_icon">
                        <img src="/specsbazaar/images/jd/percentage-percent-svgrepo-com.svg" alt="" class="table_percentage_icon">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="text-white">10</th>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <select id="mySelect10" onchange="myFunction10()">
                            <option value="product detail">Select Product Type</option>
                            <option value="id01">Frame</option>
                            <option value="id02">Lens</option>
                            <option value="id03">Repair</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><textarea name="" id="" cols="200" rows="1" style="width:98%; margin-top: 4px;"></textarea></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 75% ;">%</td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td><input type="text" style="width: 96% ;"></td>
                    <td>
                        <div class="percentage_icon">
                        <img src="/specsbazaar/images/jd/percentage-percent-svgrepo-com.svg" alt="" class="table_percentage_icon">
                        </div>
                    </td>
                </tr>
                <tr>
                    <!-- <td colspan="4"></td> -->
                    <td colspan="7" >
                        <div id="float_right">    
                            <label class="label_name" style="color:rgb(47, 85, 255)">Total Basic Amount:Rs</label>
                            <input type="text" placeholder="0.00" style="width: 10%; text-align: right;">
                            <label class="label_name" style="color:rgb(47, 85, 255)">Total GST Amount:Rs</label>
                            <input type="text" placeholder="0.00" style="width: 10%; text-align: right;">
                        </div>
                    </td>
                    <td colspan="4">
                        <div id="float_right">
                            <label class="label_name" style="color:rgb(47, 85, 255)">Total Sales:Rs</label>
                            <input type="text" style="width:32%; margin-right:1.2%; text-align: right;" placeholder="0.00">
                        </div>
                     </td>
                </tr>
                
            </table>
        </div>

<!-- Pending AMount and Table section -->

        <div id="pending_amount_and_table">
            <div class="pending_amount left">
                <h1>Pending Amount: Rs 0.00</h1>
                <div id="pending_box">
                    <div class="Pending_box_div">
                        <img src="/specsbazaar/images/jd//cup+reward+star+winner+icon-1320183068046762272.svg" alt="">
                        <p class="pending_box_div_p">Reedem Loyalty Points</p>
                    </div>
                    <div class="Pending_box_div">
                        <img src="/specsbazaar/images/jd/coupon.png" alt="" class="coupon_in_pending_div_box">
                        <p class="pending_box_div_p">Apply Discount Coupon</p>
                    </div>
                    <div class="Pending_box_div">
                        <i class="fa-sharp fa-solid fa-user-tie"></i>
                        <p class="pending_box_div_p">Allow Customer Account</p>
                    </div>
                </div>
            </div>
            <div class="pending_table right">
                <table class="border_less">
                    <tr>
                        <td>
                            <label class="label_name">Discount Amount: Rs</label>
                        </td>
                        <td class="left">
                            <input type="text" class="table_input_size" placeholder="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="label_name">Round Off: Rs</label>
                        </td>
                        <td class="left">
                            <input type="text" class="table_input_size">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="label_name">Loyalty Points Redeem Amount: Rs</label>
                        </td>
                        <td class="left">
                            <input type="text" class="table_input_size">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="label_name">Discount Coupon Amount: Rs</label>
                        </td>
                        <td class="left">
                            <input type="text" class="table_input_size">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="label_name">Payable Amount: Rs</label>
                        </td>
                        <td class="left">
                            <input type="text" class="table_input_size">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="label_name">Payment Date: Rs</label>
                        </td>
                        <td class="left">
                            <input type="date" class="table_input_size">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="label_name">Customer Account: Rs</label>
                        </td>
                        <td class="left">
                            <input type="text" class="table_input_size">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="label_name">Advance Amount: Rs</label>
                        </td>
                        <td class="left">
                            <input type="text" class="table_input_size right" placeholder="0.00">
                        </td>
                    </tr>
                </table>
            </div>
        </div>


        <br>
<!--  -->
        <!-- button start -->
        <div class="button_container" style="text-align:center;">
            <input type="button" class="btn-input" onclick="alert('hello')" value="Update Price">
            <input type="button" class="btn-input" onclick="alert('hello')" value="Get HSN/SAC Code">
        </div> <br>
        <!-- button end -->


    </div>


    <!-- Pop UP -->

    <!-- Frame Detail -->
    <div id="id01" class="modal">
        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="container">
                <!-- first section -->
                <div class="input_label_container">
                    <label class="label_name">Product Code:</label>
                    <input type="text" class="input_name" />
                </div>
                <br />
                <div class="input_label_container">
                    <label class="label_name"><span class="astrix">*</span>Name:</label>
                    <input type="text" class="input_name" style="width: 45%; margin-right: 45px" required />
                </div>
                <div class="input_label_container">
                    <label class="label_name">Brand:</label>
                    <input type="text" class="input_name" />
                </div>
                <br />
                <div class="input_label_container">
                    <label class="label_name">Color:</label>
                    <input type="text" class="input_name" style="margin-right: 30px" />
                </div>
                <div class="input_label_container">
                    <label class="label_name">Size:</label>
                    <input type="text" class="input_name" />
                </div>
                <br />
                <div class="input_label_container">
                    <label class="label_name">Type:</label>
                    <input type="text" class="input_name" style="margin-right: 30px" />
                </div>
                <div class="input_label_container">
                    <label class="label_name">Shape:</label>
                    <input type="text" class="input_name" style="margin-right: 10px" />
                </div>
                <div class="input_label_container">
                    <label class="label_name">Material:</label>
                    <input type="text" class="input_name" />
                </div>
                <br />
                <!-- button start -->
                <div class="button_container" style="text-align: left">
                    <input type="button" class="btn-input" onclick="alert('hello')" value="Update Price" />
                    <input type="button" class="btn-input" onclick="alert('hello')" value="Get HSN/SAC Code" />
                </div>
                <br />
                <!-- button end -->

                <!-- second input section -->
                <div class="input_label_container">
                    <label class="label_name">Quantity:</label>
                    <input type="text" class="input_name" value="1" style="width: 5%; margin-right: 20px" />
                </div>
                <div class="input_label_container">
                    <label class="label_name"><span class="astrix">*</span>HSN/SAC Code:</label>
                    <input type="text" class="input_name" style="margin-right: 20px" required />
                </div>
                <div class="input_label_container">
                    <label class="label_name"><span class="astrix">*</span>GST %:</label>
                    <input type="text" class="input_name" style="width: 10%; margin-right: 10px" required />
                </div>
                <br />
                <div class="input_label_container">
                    <label class="label_name">Retail Price:</label>
                    <input type="text" class="input_name" value="0.00" style="width: 8%; margin-right: 10px" />
                </div>
                <div class="input_label_container">
                    <label class="label_name">Discount:</label>
                    <input type="text" class="input_name" value="0.00" style="width: 8%; margin-right: 10px" />OR
                    <input type="text" class="input_name" value="0" style="width: 5%" />%
                </div>
                <br />
                <div class="input_label_container">
                    <label class="label_name">Basic Price:</label>
                    <input type="text" class="input_name" value="0" style="width: 8%; margin-right: 10px" />
                </div>
                <div class="input_label_container">
                    <label class="label_name">GST Amount Rs:</label>
                    <input type="text" class="input_name" value="0.00" style="width: 8%; margin-right: 10px" />
                </div>
                <div class="input_label_container">
                    <label class="label_name">Total Sales Rs:</label>
                    <input type="text" class="input_name" value="0.00" style="width: 8%; margin-right: 10px" />
                </div>
                <!-- second seciton end here -->

                <!-- last button -->
                <div class="button_container">
                    <input type="button" class="btn-input" onclick="alert('hello')" value="Add" />
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                        class="cancelbtn btn-input">
                        Cancel
                    </button>
                    <!-- <button class="btn-input">Add<i class="fa-light fa-arrow-right"></i></button> -->
                </div>
                <!-- last button -->
            </div>
        </form>
    </div>

    <!-- Lens Detail -->
    <div id="id02" class="modal">
        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="container">
                <!-- first section -->
                <div class="input_label_container">
                    <label class="label_name">Product Code:</label>
                    <input type="text" class="input_name" style="width:10%; margin-right: 38px;">
                </div>
                <div class="input_label_container">
                    <label class="label_name"> Detail:</label>
                    <input type="text" class="input_name" style="width: 42%; margin-right: 30px;" required>
                </div> <br>
                <div class="input_label_container">
                    <label class="label_name">Brand:</label>
                    <input type="text" class="input_name" style="width:15.5%; margin-right: 43px;">
                </div>
                <div class="input_label_container">
                    <label class="label_name">Color:</label>
                    <input type="text" class="input_name" style="width:16.25%; margin-right: 30px;">
                </div>
                <div class="input_label_container">
                    <label class="label_name">Material:</label>
                    <input type="text" class="input_name" style="width:15%;">
                </div><br>
                <div class="input_label_container">
                    <label class="label_name">Coating:</label>
                    <input type="text" class="input_name" style="width:14%; margin-right: 31px;">
                </div>
                <div class="input_label_container">
                    <label class="label_name">Design:</label>
                    <input type="text" class="input_name" style="width:13.25%; margin-right: 50px;">
                </div>
                <div class="input_label_container">
                    <label class="label_name">index:</label>
                    <input type="text" class="input_name">
                </div><br>
                <!-- button start -->
                <div class="button_container" style="text-align:left;">
                    <input type="button" class="btn-input" onclick="alert('hello')" value="Select Prescription">
                    <input type="button" class="btn-input" onclick="alert('hello')" value="Add Wearing Parameters">
                    <input type="button" class="btn-input" id="Clear_prescription" onclick="this.form.reset();" value="Clear Prescription">
                </div> <br>
                <!-- button end -->


                <!-- second input section -->
                <div class="input_label_container">
                    <label class="label_name">Patient Name:</label>
                    <input type="text" class="input_name" style="width:15%; margin-right: 2.8rem;">
                </div>

                <div class="input_label_container">
                    <label class="label_name">Docter/Optomestrist Name:</label>
                    <select>
                        <option value="Mr">Mr</option>
                        <option value="Ms">Ms</option>
                        <option value="Mrs">Mrs</option>
                    </select>
                    <input type="text" class="input_name" style="width:15.5%;">
                </div> <br>

                <div class="checkbox_div">
                    <div class="input_label_container" style="margin-right: -23px;">
                        <label class="label_name">right:</label>
                        <input type="checkbox" class="input_name" style="margin-right: 29.5rem;">
                    </div>

                    <div class="input_label_container">
                        <label class="label_name">left:</label>
                        <input type="checkbox" class="input_name">
                    </div>
                </div><br>
                <!-- end of second input section -->
                <!-- javascript box section-->
                <div class="prescription_box">
                    <div class="btn-prescription-box">
                        <input type="button" id="eyewear_box" value="Eyewear Prescription" class="Prescription_DOM">
                        <input type="button" id="contact_lens_box" value="Contact Lens Prescription"
                            class="Prescription_DOM">
                        <input type="button" id="transport_box" value="Transpose Prescription" class="Prescription_DOM">
                    </div>

                    <div class="prescription_modal01">


                        <div id="modal01">
                            <div class="table">

                                <div class="dis" style="margin: 8px;">
                                    <br><br>
                                    <label>Distance</label>
                                    <br>
                                    <label>Near Vision</label>
                                    <br>
                                    <label>Addition</label>
                                    <br>
                                    <label>IPD</label>
                                </div>

                                <div class="re">
                                    <label class="just">Right Eye</label>

                                    <div class="reye">
                                        <label>R-SPH</label>
                                        <label>R-AXIS</label>
                                        <label>R-CYL</label>
                                        <label>R-PD</label>
                                        <label>R-VA</label>
                                    </div>

                                    <div class="ieye">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye">
                                        <input type="" name="" class="input_name1">
                                    </div>



                                </div>

                                <div class="le">
                                    <label>Left Eye</label>

                                    <div class="leye" style="margin-left:1rem;">
                                        <label>L-SPH</label>
                                        <label>R-AXIS</label>
                                        <label>L-CYL</label>
                                        <label>L-PD</label>
                                        <label>L-VA</label>
                                    </div>

                                    <div class="ieye" style="margin-left:1rem;">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye" style="margin-left:1rem;">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye" style="margin-left:1rem;">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye" style="margin-left:1rem;">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                </div>

                            </div>


                        </div>

                        <div id="modal02">
                            <div class="table">

                                <div class="dis" style="margin-top: 15px;">
                                    <br><br>
                                    <label>Distance</label>
                                    <br>
                                </div>

                                <div class="re">
                                    <label class="just">Right Eye</label>

                                    <div class="reye" style="margin: 5px;">
                                        <label>R-SPH</label>
                                        <label>R-CYL</label>
                                        <label>R-AXIS</label>
                                    </div>

                                    <div class="ieye" style="margin: 5px;">
                                        <input type="" name="" class="input_name1"
                                            style="background-color: rgb(255, 255, 218); border: 1px solid black;">
                                        <input type="" name="" class="input_name1"
                                            style="background-color: rgb(255, 255, 218); border: 1px solid black;">
                                        <input type="" name="" class="input_name1"
                                            style="background-color: rgb(255, 255, 218); border: 1px solid black;">
                                    </div>

                                    <br>

                                </div>

                                <div class="le">
                                    <label>Left Eye</label>

                                    <div class="leye" style="margin: 5px;">
                                        <label>L-SPH</label>
                                        <label>L-CYL</label>
                                        <label>R-AXIS</label>
                                    </div>

                                    <div class="ieye" style="margin: 5px;">
                                        <input type="" name="" class="input_name1"
                                            style="background-color: rgb(255, 255, 218); border: 1px solid black;">
                                        <input type="" name="" class="input_name1"
                                            style="background-color: rgb(255, 255, 218); border: 1px solid black;">
                                        <input type="" name="" class="input_name1"
                                            style="background-color: rgb(255, 255, 218); border: 1px solid black;">
                                    </div>

                                    <br>

                                </div>

                            </div>

                        </div>

                        <div id="modal03">
                            <div class="table">


                                <div class="dis" style="margin: 8px;">
                                    <br><br>
                                    <label>Distance</label>
                                    <br>
                                    <label>Near Vision</label>
                                    <br>
                                    <label>Addition</label>
                                    <br>
                                    <label>IPD</label>
                                </div>

                                <div class="re">
                                    <label class="just">Right Eye</label>

                                    <div class="reye">
                                        <label>R-SPH</label>
                                        <label>R-AXIS</label>
                                        <label>R-CYL</label>
                                        <label>R-PD</label>
                                        <label>R-VA</label>
                                    </div>

                                    <div class="ieye">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye">
                                        <input type="" name="" class="input_name1">
                                    </div>



                                </div>

                                <div class="le">
                                    <label>Left Eye</label>

                                    <div class="leye" style="margin-left:1rem;">
                                        <label>L-SPH</label>
                                        <label>R-AXIS</label>
                                        <label>L-CYL</label>
                                        <label>L-PD</label>
                                        <label>L-VA</label>
                                    </div>

                                    <div class="ieye" style="margin-left:1rem;">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye" style="margin-left:1rem;">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye" style="margin-left:1rem;">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                    <br>

                                    <div class="ieye" style="margin-left:1rem;">
                                        <input type="" name="" class="input_name1">
                                    </div>

                                </div>
                            </div>










                        </div>
                    </div><br>
                </div>
                <!-- end here javascript box section-->
                <!-- another check box section -->
                <div class="checkbox_div">
                    <div class="input_label_container">
                        <label class="label_name">Lens Type:</label>
                        <input type="checkbox" class="input_name">
                    </div>

                    <div class="input_label_container">
                        <label class="label_name">Constant Use:</label>
                        <input type="checkbox" class="input_name">
                    </div>

                    <div class="input_label_container">
                        <label class="label_name">Reading Wear:</label>
                        <input type="checkbox" class="input_name">
                    </div>

                    <div class="input_label_container">
                        <label class="label_name">Distance Wear:</label>
                        <input type="checkbox" class="input_name">
                    </div>

                    <div class="input_label_container">
                        <label class="label_name">Single Vision:</label>
                        <input type="checkbox" class="input_name">
                    </div>

                    <div class="input_label_container">
                        <label class="label_name">Progressive:</label>
                        <input type="checkbox" class="input_name">
                    </div>

                    <div class="input_label_container">
                        <label class="label_name">Bifocal:</label>
                        <input type="checkbox" class="input_name">
                    </div>

                    <div class="input_label_container">
                        <label class="label_name">Trifocal:</label>
                        <input type="checkbox" class="input_name">
                    </div>
                </div><br>


                <!-- end here another check box section -->

                <!-- description box with button -->

                <div class="input_label_container">

                    <label class="label_name textarea_label">Prescription Notes:</label>
                    <textarea rows="3" cols="50"></textarea>

                    <div class="textarea_button">
                        <input type="button" class="btn-input" onclick="alert('hello')" value="Update Price">
                        <input type="button" class="btn-input" onclick="alert('hello')" value="Get HSN/SAC Code">

                    </div>

                </div>

                <!-- description box with button -->

                <!-- ? input section -->
                <div class="GST_container">
                    <div class="input_label_container">
                        <label class="label_name"><span class="astrix">*</span>HSN/SAC Code:</label>
                        <input type="text" class="input_name" style="margin-right: 20px;" required>
                    </div>
                    <div class="input_label_container">
                        <label class="label_name"><span class="astrix">*</span>GST %:</label>
                        <input type="text" class="input_name" style="width: 10%; margin-right: 10px;" required>
                    </div><br>
                    <div class="input_label_container">
                        <label class="label_name">Retail Price:</label>
                        <input type="text" class="input_name" value="0.00" style="width: 8%; margin-right: 10px;">
                    </div>
                    <div class="input_label_container">
                        <label class="label_name">Discount:</label>
                        <input type="text" class="input_name" value="0.00" style="width: 8%; margin-right: 10px;">OR
                        <input type="text" class="input_name" value="0" style="width: 5%;">%
                    </div><br>
                    <div class="input_label_container">
                        <label class="label_name">Basic Price:</label>
                        <input type="text" class="input_name" value="0"
                            style="width: 8%; margin-right: 10px; background-color: rgb(255, 255, 218); border: 1px solid black;">
                    </div>
                    <div class="input_label_container">
                        <label class="label_name">GST Amount Rs:</label>
                        <input type="text" class="input_name" value="0.00"
                            style="width: 8%; margin-right: 10px; background-color: rgb(255, 255, 218); border: 1px solid black;">
                    </div>
                    <div class="input_label_container">
                        <label class="label_name">Total Sales Rs:</label>
                        <input type="text" class="input_name" value="0.00"
                            style="width: 8%; margin-right: 10px; background-color: rgb(255, 255, 218); border: 1px solid black;">
                    </div>
                </div>
                <!-- second seciton end here -->

                <!-- last button -->
                <div class="button_container">
                    <input type="button" class="btn-input" onclick="alert('hello')" value="Add">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'"
                        class="cancelbtn btn-input">Cancel</button>
                    <!-- <button class="btn-input">Add<i class="fa-light fa-arrow-right"></i></button> -->
                </div>
                <!-- last button -->
            </div>


        </form>
    </div>

    <!-- Repair Detail -->

    <div id="id03" class="modal">
        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="container">
                <!-- first section -->
                <div class="input_label_container">
                    <label class="label_name"><span class="astrix">*</span>Description:</label>
                    <input type="text" class="input_name" />
                </div>
                <br />

                <!-- button start -->
                <div class="button_container" style="text-align: left">
                    <input type="button" class="btn-input" onclick="alert('hello')" value="Update Price" />
                    <input type="button" class="btn-input" onclick="alert('hello')" value="Get HSN/SAC Code" />
                </div>
                <br />
                <!-- button end -->

                <!-- second input section -->

                <div class="input_label_container">
                    <label class="label_name"><span class="astrix">*</span>HSN/SAC Code:</label>
                    <input type="text" class="input_name" style="margin-right: 20px" required />
                </div>
                <div class="input_label_container">
                    <label class="label_name"><span class="astrix">*</span>GST %:</label>
                    <input type="text" class="input_name" style="width: 10%; margin-right: 10px" required />
                </div>
                <br />
                <div class="input_label_container">
                    <label class="label_name">Retail Price:</label>
                    <input type="text" class="input_name" value="0.00" style="width: 8%; margin-right: 10px" />
                </div>
                <div class="input_label_container">
                    <label class="label_name">Discount:</label>
                    <input type="text" class="input_name" value="0.00" style="width: 8%; margin-right: 10px" />OR
                    <input type="text" class="input_name" value="0" style="width: 5%" />%
                </div>
                <br />
                <div class="input_label_container">
                    <label class="label_name">Basic Price:</label>
                    <input type="text" class="input_name" value="0" style="width: 8%; margin-right: 10px" />
                </div>
                <div class="input_label_container">
                    <label class="label_name">GST Amount Rs:</label>
                    <input type="text" class="input_name" value="0.00" style="width: 8%; margin-right: 10px" />
                </div>
                <div class="input_label_container">
                    <label class="label_name">Total Sales Rs:</label>
                    <input type="text" class="input_name" value="0.00" style="width: 8%; margin-right: 10px" />
                </div>
                <!-- second seciton end here -->

                <!-- last button -->
                <div class="button_container">
                    <input type="button" class="btn-input" onclick="alert('hello')" value="Add" />
                    <button type="button" onclick="document.getElementById('id03').style.display='none'"
                        class="cancelbtn btn-input">
                        Cancel
                    </button>
                    <!-- <button class="btn-input">Add<i class="fa-light fa-arrow-right"></i></button> -->
                </div>
                <!-- last button -->
            </div>
        </form>
    </div>


    <!-- Pop UP -->



    <script>
        // Get the modal
        var modal_1 = document.getElementById("id01");
        var modal_2 = document.getElementById("id02");
        var modal_3 = document.getElementById("id03");

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal_1) {
                modal_1.style.display = "none";
            } else if (event.target == modal_2) {
                modal_2.style.display = "none";
            } else if (event.target == modal_3) {
                modal_3.style.display = "none";
            }
        };
    </script>


    <script src="/specsbazaar/js/jdindex.js"></script>
</body>
         