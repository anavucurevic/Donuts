<?php
    require '../broker.php';
    $broker=Broker::getBroker();
   
    $ime=$_POST['ime'];
    if(!preg_match('/^[a-zA-Z]*$/',$ime)){
        header("Location: ../../kategorije.php?greska=Neispravno ime");
    }else{
        $rezultat=$broker->udc("insert into kateogorija(ime) values ('".$ime."') ");
        if($rezultat['status']){
            header("Location: ../../kategorije.php");
        }else{
            header("Location: ../../kategorije.php?greska=".$rezultat['error']);
        }
    }
       


?>