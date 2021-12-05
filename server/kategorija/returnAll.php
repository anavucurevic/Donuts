<!-- on komunicira sa brokerom a broker komunicira sa bazom-->class

<?php
    require '../broker.php';     // napravi vezu sa brokerom kada ga napravis 
    $broker=Broker::getBroker();
  
    
    echo json_encode($broker->vratiKolekciju('select * from kategorija'));

?>