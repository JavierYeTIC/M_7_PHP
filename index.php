<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    session_start();
    include "dbconf.php";
    if(isset($_SESSION["LoggedIn"])){

    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    echo "<h2>Hola " . $_SESSION["nom"]. " ets un ". $_SESSION["rol"]. "</h2>";

    echo "<a href = 'mostrainfo.php?id=".$_SESSION["user_id"]."'>Mostrar informació</a>    <a href = 'desconet.php'>Desconnectar</a>";

    if ($_SESSION["rol"] == 'professorat') {

        $lista_query = "SELECT name , surname , email FROM `user` ;";
        echo "<table><tr><th>Nom</th><th>Cognom</th><th>Email</th></tr>";
        $lista = mysqli_query($connect, $lista_query);
        foreach($lista as $prod){
            echo "<tr><td>".$prod['name']."</td><td>".$prod['surname']."</td><td>".$prod['email']."</td></tr>";
        }
        echo "</table>";
    }
}
    ?>
</body>
</html>