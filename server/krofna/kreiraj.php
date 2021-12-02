<?php
require '../broker.php';
$broker=Broker::getBroker();



$naziv=$_POST['naziv'];
$kalorije=$_POST['kalorije'];
$kategorija_id=$_POST['kategorija_id'];
$slika=$_FILES['slika'];
$recept=$_POST['recept'];
$nazivSlike=$slika['name'];
$lokacija = "../../slike/".$nazivSlike;
 // proveriti putanje

if(!move_uploaded_file($_FILES['slika']['tmp_name'],$lokacija)){
    $lokacija="";
    header("Location: ../../napraviKofnu.php?greska=Prebacivanje slike nije uspelo!");
    exit;
}else{
    
    $lokacija=substr($lokacija,4);
}

$rezultat=$broker->udc("insert into krofna(naziv,kalorije,kategorija_id,slika,recept) values ('".$naziv."',".$kalorije.",".$kategorija_id.",'".$lokacija."','".$recept."') ");
if($rezultat['status']){
    header("Location: ../../napraviKrofnu.php");
}else{
    header("Location: ../../napraviKrofnu.php?greska=".$rezultat['error']);
}





?>