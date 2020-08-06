<html>

<head>
<title>Kundenportal</title>
	<link type="text/css" rel="stylesheet" href="css/Material.css">
    <meta charset="utf-8">
    <link href="../css/mainStyles.css" rel="stylesheet" type="text/css"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Hind|Muli:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta type="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body style="padding-top: 0px;">

	<?php
    include '../DB/DB.php';
    DB::$user= "root";
    DB::$dbName = "portfolio";
    session_start();

    $result = DB::query("SELECT * FROM material");
    ?>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">Bezeichnung</th>
            <th scope="col">Menge / VPE</th>
            <th scope="col">VPE Preis</th>
            <th scope="col">Beispielbild</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $datensatz) {
        echo '<tr>';
        echo '<th scope="row">' .$datensatz['bezeichnung']. '</th>';
        echo '<td>'.$datensatz['vpeMenge'].' St.'.'</td>';
        echo '<td>'.$datensatz['vpePreis'].'€'.'</td>';
            echo '<td>'.'<img alt= '. $datensatz['bezeichnung']. ' src= '.$datensatz['bild'].'
               width="75px" height = "75px">'.'</td>';

            echo '</tr>';
        }
        ?>
        </tr>


        </tbody>
    </table>


</body>
</html>