<?php
include("init.php");
require('letClass.php');
$id=$_GET['id'];
$let = new Let($mysqli);
$let->allReservationBySearch($id);
$result = $let->getResult();
$niz = array();
$iterator = 0;
while($red = mysqli_fetch_assoc($result)) {
      $niz[$iterator] = $red;
      $iterator++;
   }

   echo(json_encode($niz));


 ?>