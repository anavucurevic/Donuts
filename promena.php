<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Promena</title>
</head>
<body>
<?php

if(!isset($_GET['id'])){
    header('Location: index.php');
}
require './server/broker.php';
$broker=Broker::getBroker();
$rezultat=$broker->vratiKolekciju('select * from krofna where id='.$_GET['id']);
$krofna=$rezultat['kolekcija'][0];

// kod popraviti
?>


<body>
<style>
    body {
        background-image: url('<?php echo $krofna->slika; ?>') !important;
        background-size: cover;
    }
</style>
<?php include 'header.php'; ?>
<div class='container'>
    <div class='row mt-2'>
        <div class='col-6'>
            <h1 class='text-center bg-light'>Promeni podatke o receptu za krofnu</h1>
        </div>
        <div class='col-2'>
            <form action="./server/krofna/delete.php" method="post">
            <input type="text" hidden name='id' value='<?php echo $krofna->id;?>'>    
            <button class="btn btn-danger form-control mt-2">Obrisi</button>
            </form>
        </div>
    </div>

    <div class="row mt-2" <?php echo (!isset($_GET['greska']))?'hidden':''; ?>>
        <h2 class="text-danger">
            <?php echo $_GET['greska'];?>
        </h2>
    </div>
    <input type="text" id='kategorija_id_hidden' hidden value='<?php echo $krofna->kategorija_id; ?>'>
    <div class="row mt-2">
        <div class="col-8 bg-light">
            <form action="./server/krofna/izmeni.php" method="post">
            <input type="text" hidden name='id' value='<?php echo $krofna->id;?>'>     
            <label>Naziv</label>
                <input type="text" required class="form-control" value='<?php echo $krofna->ime; ?>' name="ime">
                <label>Kalorije</label>
                <input type="number" required min="1" max="9" value='<?php echo $krofna->kalorije; ?>'
                    class="form-control" name="kalorije">
                <label>Kategorija</label>
                <select id='kat'  class="form-control" required
                    name='kategorija_id'>

                </select>

                <label>Recept</label>
                <textarea required name="recept" cols="30" rows="5" class="form-control">
                <?php echo $krofna->recept; ?>
                </textarea>
                <button class="form-control btn btn-primary mt-2 mb-2">Promeni</button>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js" 
 ></script>





<script>
    $(document).ready(function () {
        $.getJSON('./server/kategorija/returnAll.php', function (data) {
            console.log(data);
            if (!data.status) {
                alert(data.error);
                return;
            }

            for (let kateg of data.kolekcija) {
                $('#kat').append(`
                    <option  value='${kateg.id}'> ${kateg.naziv} </option>
                `)
            }
            $('#kat').val($('#kategorija_id_hidden').val());
        })
    })
</script>
</body>
</html>