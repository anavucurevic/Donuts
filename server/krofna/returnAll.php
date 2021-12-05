<?php
    require '../broker.php';
    $broker=Broker::getBroker();
  
    
    echo json_encode($broker->vratiKolekciju("select k.*, v.ime as 'kategorija_naziv' from krofna k inner join kategorija v on(k.kategorija_id=v.id)"));

?>