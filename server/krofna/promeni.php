<?php
    require '../broker.php';
    $broker=Broker::getBroker();



     $ime=$_POST['ime'];
    $kalorije=$_POST['kalorije'];
    $kategorija_id=$_POST['kategorija_id'];
    $recept=$_POST['recept'];
    $id=$_POST['id'];
   
    
    $upit="update krofna set ime='".$ime."', kalorije=".$kalorije.", kategorija_id=".$kategorija_id.", recept='".$recept."' where id=".$id;
    
    if(!isset($id)){
        header('Location: ../../promeni.php&id='.$id.'&greska=Nije prosledjen id');
        exit;
    }
   
    $broker->udc( $upit);
    header('Location: ../../index.php');


?>