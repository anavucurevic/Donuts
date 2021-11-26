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


<?php include 'header.php'; ?>

<div class='container'>
        <div class="row mt-2">
            <div class="col-3">
                <select id='sort' class="form-control">
                    <option value="">Sortiraj po nazivu</option>
                    <option value="ASC">po abecedi</option>
                    <option value="DESC">unazad</option>
                </select>
            </div>
            <div class="col-6">
                <input type="text" id='nazivFil' class="form-control" placeholder="Filtriraj po nazivu">
            </div>
            <div class="col-3">
                <select id='kateg' class="form-control">
                    <option value="0">Filtriraj po kategoriji</option>

                </select>
            </div>
        </div>
        <div id='elementi'>

        </div>
    </div>


    

 
</body>

</html>