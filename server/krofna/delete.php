<?php
    require '../broker.php';
    
    $broker=Broker::getBroker();
    $id=$_POST['id'];
    if(!isset($id) || !intval($id)){
       header('Location: ../../promeni.php&id='.$id.'&greska=Los ID');
    }else{
        $broker->udc('delete from krofna where id='.$id);
        header('Location: ../../index.php');
    }
    
    


?>