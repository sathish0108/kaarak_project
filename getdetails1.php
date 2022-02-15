<?php
$con=new mysqli("localhost","root","","json1");
$sql="select * from mobile1";
$res=$con->query($sql);
while($row=$res->fetch_assoc())
{
    $mobile[] =$row;
}
echo json_encode($mobile);
?>

