<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include ('config/conn.php');
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $username = $row['username'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $address = $row['address'];
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['contact'] = $contact;
                    $_SESSION['address'] = $address;
                    if(isset($_POST['remember'])){
                        setcookie ("user_username",$email,time()+(10*365*24*60*60));
                        setcookie ("user_password",$password,time()+(10*365*24*60*60));
                    }else{
                        if(isset($_COOKIE['user_username'])){
                            setcookie ("user_username","");
                        }
                        if(isset($_COOKIE['user_password'])){
                            setcookie ("user_password","");
                        }
                    }
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>index.php';</script>
                    <?php
                }
                else{
                    echo '<script> alert("Invalid Email ")</script>';
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>index.php';</script>
                    <?php
                    
                }
            }
        }else{
            echo '<script> alert("No Email ")</script>';
            ?>
            <script>window.location.href='<?php echo SITEURL;?>index.php';</script>
            <?php
        }
    }
?>