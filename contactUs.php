<?php
include 'config/conn.php';
$email = $_POST['email'];
$username = $_POST['username'];
$contact = $_POST['contact'];
$subject=$_POST['subject'];
$message=mysqli_real_escape_string($conn,$_POST['message']);
$solved = 'No';

$sql = "INSERT INTO contact SET
    email= '$email',
    username= '$username',
    contact= $contact,
    subject= '$subject',
    message= '$message',
    solved = '$solved'
";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if($res==TRUE)
{
    ?>
    <script>window.location.href='<?php echo SITEURL;?>index.php'
    alert('Ticket Raised Successfully');
    </script>;
    <?php
}
else
{
    ?>
    <script>window.location.href='<?php echo SITEURL;?>index.php'</script>;
    <?php
}
?>