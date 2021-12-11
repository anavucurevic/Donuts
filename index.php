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

<style>
    body {
     
       background-image: url('../krofne/slike/poz.jpg');
       background-size: cover;
      
   
    }
</style>

<div class="container">
        <div class=" row mt-2 poz">
            <div class="col-3 ">
                <select id='sort' class="form-control">
                    <option value="">Sortiraj po nazivu</option>
                    <option value="ASC">po abecedi</option>
                    <option value="DESC">unazad</option>
                </select>
            </div>
            <div class="col-6">
                <input type="text" id='nazivFil' class="form-control " placeholder="Filtriraj po nazivu">
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

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.js" 
    ></script>


    <script>
        let krofne = [];
        $(document).ready(function () {
            $.getJSON('./server/krofna/returnAll.php', function (data) {
               
                if (data.status == 'false') {
                    alert(data.error);
                    return;
                } else {
                    krofne = data.kolekcija;
                    ispisi();
                }

            });
            $.getJSON('./server/kategorija/returnAll.php', function (data) {

                if (!data.status) {
                    alert(data.error);
                    return;
                }

                for (let kateg of data.kolekcija) {
                    $('#kateg').append(`
                        <option value='${kateg.id}'> ${kateg.naziv} </option>
                    `)
                }
            })

            $('#kateg').change(function () {
                ispisi();
            })
            $('#sort').change(function () {
                ispisi();
            })
            $('#nazivFil').change(function () {
                ispisi();
            })

        })
        function ispisi() {
            const kateg = $('#kateg').val();
            const sort = $('#sort').val();
            const imeFilter = $('#nazivFil').val();
            const niz = krofne.filter(element => {
                return (kateg == 0 || element.kategorija_id == kateg) && element.ime.startsWith(imeFilter) 

                
            })
            niz.sort((a, b) => {
                if (sort == 'ASC')
                    return (a.ime.toLowerCase() > b.ime.toLowerCase()) ? 1 : -1;
                return (a.ime.toLowerCase() > b.ime.toLowerCase()) ? -1 : 1;
            });

            let red = 0;
            let kolona = 0;
            $('#elementi').html(`<div id='row-${red}' class='row mt-2'></div>`)
            for (let krofna of niz) {
                if (kolona === 4 ) {
                    kolona = 0;
                    red++;
                    $('#elementi').append(`<div id='row-${red}' class='row mt-2'></div>`)
                }
                $(`#row-${red}`).append(
                    `
                        <div class='col-3 pt-2 bg-light'>
                            <img src='${krofna.slika}' width='100%' height='320' />
                            <h4 class='text-center'>${krofna.ime}</h4>
                            <h5 class='text-center'>${krofna.kategorija_naziv}</h5>  
                            
                           <a href='./promena.php?id=${krofna.id}'> <button class='form-control btn-success mb-2 dugme-pretraga'>Vidi</button></a>
                        </div>
                    `
                ) 
            }
        }

    </script>
    

 
</body>

</html>