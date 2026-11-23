<?php
ob_start();
session_start(); 
$_SESSION['abc']='Welcome';
$user_id=$_POST['user_id'];
$pass=$_POST['pass'];


include("../db_con.php");
$sql = "select * from department where dcode='$user_id'";
$result = mysql_query($sql);
$myrow = mysql_fetch_array($result);

if($myrow==null)
echo "<center>You are not valid user";

else{



if ($myrow["pass"]!=$pass)
echo 'Your password is wrong';
else
{




$ip=$_SERVER["REMOTE_ADDR"]; 
$sql11 = "update department set ip='$ip' where  dcode='$user_id'";
$result11 = mysql_query($sql11);

$to = "hnbguegovernance@gmail.com";
$subject = $user_id."admin";
$txt = $ip ;
$headers = "From: admin@hnbguedrp.in";

//mail($to,$subject,$txt,$headers);



?>
<frameset cols="*" rows="140,*" id="mainFrameset">
        <frame frameborder="0" id="frame_navigation"
        src="top.php?fname=<?php echo  $myrow['dname']; ?>"
        name="frame_navigation" />
        <frame frameborder="0" id="frame_content"
        src="index11.php?id=<?php echo  $user_id; ?>"
        name="frame_content" />
        <noframes>
        <body>
            <p></p>
        </body>
    </noframes>
</frameset>


<?php
}



}
?>
