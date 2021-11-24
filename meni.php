<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

<?php include 'header.php'; ?>   

    <!-- pretraga pocinje -->

    <section class="pretraga-krofni txtc">
        <div class="okvir">
            <form action="krofne-pretraga.html" method="post">
                <input type="search" name="search" placeholder="Pretrazi krofne..." required>
                <input type="submit" name="submit" value="Pretrazi" class="btn dugme-pretraga">
            </form>
        </div>
    </section>
    <!-- pretraga se završava -->

    <!-- meni pocinje -->
    <section class="jelovnik">
        <div class="okvir">
            <h2 class="txtc"> Jelovnik</h2>

            <div class="jelovnik-box">
                <div class="jelovnik-slike">
                    <img src="slike/cokoladna-krofna-ferero.png" alt="Krofna1" class="img-resp img-cur ">

                </div>

                <div class="jelovnik-desc">
                    <h4>Krofna1</h4>
                    <p class="jelovnik-cena">300din</p>
                    <p class="jelovnik-opis"> crna cokolada sa keksom</p>

                    <br>

                    <a href="poruci.html" class="btn dugme-pretrazi">Poruci sada</a>
                </div>

            </div>

            <div class="jelovnik-box">
                <div class="jelovnik-slike">
                    <img src="slike/nutelofna.png" alt="Krofna2" class="img-resp img-cur">

                </div>

                <div class="jelovnik-desc">
                    <h4>Krofna2</h4>
                    <p class="jelovnik-cena">200din</p>
                    <p class="jelovnik-opis"> crna cokolada sa bombonama</p>

                    <br>

                    <a href="#" class="btn dugme-pretrazi">Poruci sada</a>
                </div>

            </div>

            <div class="jelovnik-box">
                <div class="jelovnik-slike">
                    <img src="slike/bakina.png" alt="Krofna3" class="img-resp img-cur">

                </div>

                <div class="jelovnik-desc">
                    <h4>Krofna3</h4>
                    <p class="jelovnik-cena">150din</p>
                    <p class="jelovnik-opis"> bela cokolada sa bombonama</p>

                    <br>

                    <a href="#" class="btn dugme-pretrazi">Poruci sada</a>
                </div>

            </div>


            <div class="jelovnik-box">
                <div class="jelovnik-slike">
                    <img src="slike/lemonberry.png" alt="Krofna4" class="img-resp img-cur">

                </div>

                <div class="jelovnik-desc">
                    <h4>Krofna1</h4>
                    <p class="jelovnik-cena">200din</p>
                    <p class="jelovnik-opis"> sumsko voce</p>

                    <br>

                    <a href="#" class="btn dugme-pretrazi">Poruci sada</a>
                </div>

            </div>

        </div>
    </section>

    <!-- meni se yavrsava -->
</body>

</html>