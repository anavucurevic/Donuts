<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php include 'header.php '; ?>
    <div class='container'>
        <div class='row mt-2 '>
            <h1>Napravi svoju novu krofnu!</h1>

        </div>
        <div class='row mt-2' <?php echo (!isset($_GET['greska']))?'hidden':''; ?>>
            <h2 class='text-danger bg-light'>
                <?php echo $_GET['greska']; ?>
            </h2>
        </div>


        <div class="row mt-2   pretraga-krofni">
            <div class="col-8 bg-light  okvir">
                <form action="" method="post" enctype="multipart/form-data" size='200'>
                    <!-- kada napravis putanju dodaj posle !-->
                    <label>Naziv</label>
                    <input type="text" required class="form-control" name="naziv">
                    <label>Kalorije</label>
                    <input type="number" required min="0" max="100" class="form-control" name="kalorije">
                    <label>Kategorija</label>
                    <select id='kat' class="form-control" required name='kategorija_id'>

                    </select>
                    <label>Slika</label>
                    <input type="file" required class="form-control" name="slika">
                    <label>Recept</label>
                    <textarea required name="recept" cols="30" rows="5" class="form-control">

                    </textarea>
                    <button class="form-control btn btn-primary mt-2 mb-2   dugme-pretraga ">Napravi</button>
                </form>
            </div>
        </div>
    </div>

    
</body>
</html>