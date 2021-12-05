<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Kategorije</title>
</head>
<body>
<?php include 'header.php '; ?>
    <div class='container'>
        <div class='row mt-2'>
            <div class='col-7'>
                <table class='table table-light display'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv kategorije</th>
                        </tr>
                    </thead>
                    <tbody id='elementi'>

                    </tbody>
                </table>
            </div>
            <div class='col-5'>
                <h2>Kreiraj kategoriju</h2>
                <form class='mb-5' action="./server/kategorija/kreiraj.php" method="post"> 
                    <label>Naziv kategorije</label>
                    <input type="text" name='naziv' class='form-control'>
                    <label class='text-danger bg-light' <?php echo (!isset($_GET['greska']))?'hidden':''; ?> ><?php echo $_GET['greska']; ?></label>
                    <button type='submit' class='form-control btn btn-primary mt-2'>Napravi</button>
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
                $('#elementi').html('');
                for (let kateg of data.kolekcija) {
                    $('#elementi').append(`
                        <tr>
                            <td>${kateg.id}</td>
                            <td>${kateg.naziv}</td>
                            <td>
                                <button class='form-control btn btn-danger' onClick=obrisi(${kateg.id}) >Obrisi</button>
                            </td>
                        </tr>
                    `)
                }
            })
        })
        function obrisi(id_kategorije) {
            $.post('./server/kategorija/delete.php', { id: id_kategorije }, function (data) {
                if (data.status=='false') {
                    alert(data.error)
                } else {
                    window.location.reload();
                }
            })
        }
    </script>

</body>
</html>