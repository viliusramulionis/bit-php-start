<?php 
define('BASE_DIR', __DIR__);

function message($status, $message) {

    $messages = [
        1 => 'Prekės sėkmingai pridėtos',
        2 => 'Neužpildyti formos laukeliai',
        3 => 'Prekė sėkmingai ištrinta',
        4 => 'Įvyko klaida',
        5 => 'Prekė sėkmingai iššsaugota'
    ];    

    //Statusas 1 arba 2. 1 reiskia sekminga veiksma. 2 Reiskia nesekme.
    $klase = 'success';

    if($status == 2) {
        $klase = 'danger';
    }

    echo '<div class="alert alert-'.$klase.'" role="alert">';
    echo $messages[$message];
    echo '</div>';
}

if( isset($_GET['action']) AND $_GET['action'] == 'test' ){
    echo 'Mygtukas paspaustas.';
    exit();
} 

//CRUD - Create, Read, Update, Delete
$db = file_get_contents('./db.json');
$db = json_decode($db, true); 

if( isset($_POST['prekes']) ) {
    if(
        $_POST['prekes']['prekes_pavadinimas'] != '' AND
        $_POST['prekes']['kaina'] != '' AND
        $_POST['prekes']['kiekis'] != ''
    ) {

        $db = file_get_contents('./db.json');

        $db = json_decode($db, true);

        $prekes = [$_POST['prekes']];
        
        if($db) {
            $prekes = array_merge($db, $prekes);
        }

        $json = json_encode($prekes);

        file_put_contents('./db.json', $json);

        header('Location: index.php?status=1&message=1');

    } else {

        header('Location: index.php?status=2&message=2');

    }

}

if( isset($_GET['action']) AND $_GET['action'] == 'delete') {

    if( isset($_GET['id']) ) {

        $id = $_GET['id'];

        $db = json_decode( file_get_contents('./db.json'), true);

        unset($db[$id]);

        if( file_put_contents( './db.json', json_encode($db) ) ) {
            header('Location: index.php?status=1&message=3');
        } else {
            header('Location: index.php?status=2&message=4');
        }
        
    }

}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prekiu issaugojimas</title>
    <!-- Bootstrap CDN nuoroda -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom stiliu failas -->
    <link href="assets/css/custom.css" rel="stylesheet">
  </head>
  <body class="bg-light">
        <div class="container container-small">
            
        <main>  

                <div class="py-5 text-center">

                    <a href="#" class="w-100 btn btn-primary btn-lg" id="mygtukas">Siųsti GET requestą</a>
                    <div id="response"></div>
                    <h2>Prekiu pridėjimas</h2>

                    <?php
                        if( isset($_GET['status']) AND isset($_GET['message'])) {
                            message($_GET['status'], $_GET['message']);
                        }
                    ?>

                    <div class="text-start">
                        
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Prekės pavadinimas</th>
                                <th>Kaina</th>
                                <th>Kiekis</th>
                                <th style="width: 25%;"></th>
                            </thead>
                            <tbody>
                                <?php
                                    $db = json_decode( file_get_contents('./db.json'), true);
                                    foreach($db as $id => $reiksme) :
                                ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $reiksme['prekes_pavadinimas']; ?></td>
                                        <td><?php echo $reiksme['kaina']; ?></td>
                                        <td><?php echo $reiksme['kiekis']; ?></td>
                                        <td>
                                            <a href="index.php?action=delete&id=<?php echo $id; ?>" class="btn btn-danger">Ištrinti</a>
                                            <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-primary">Redaguoti</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-lg-12">
                        <form method="POST" action="" id="prekesIkelimas">
                            <div class="row g-3">

                                <div class="col-sm-8">
                                    <label class="form-label">Prekės pavadinimas</label>
                                    <input type="text" id="prekesPavadinimas" class="form-control" 
                                    name="prekes[prekes_pavadinimas]" value="" />
                                </div>
                                <div class="col-sm-2">
                                    <label class="form-label">Prekės kainą</label>
                                    <input type="text" id="prekesKaina" class="form-control" 
                                    name="prekes[kaina]" value="" />
                                </div>
                                <div class="col-sm-2">
                                    <label class="form-label">Prekių kiekis</label>
                                    <input type="number" id="prekesKiekis" name="prekes[kiekis]" 
                                    class="form-control" value="" />
                                </div>
                            </div>
                            <div class="mt-5 mb-5">
                                <button class="w-100 btn btn-primary btn-lg" type="submit">Siųsti duomenis</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>
