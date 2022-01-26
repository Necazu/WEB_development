
<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: \PROIECT_FINAL/login.php");
    exit;
}
?><!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
    <link href="css/edit.css" rel="stylesheet">
</head>
<body>
  

    <div id="pag">
    	<header id="h1">
        <div id="poz1">
                <img src="img/logo.png" width="200px" id="poz" >
            </div>
    	</header>
                <br>
                <nav id="meniu">
            <br><br><br><br><br><br>
            <a href="admin.php">ADMIN</a><br>
            <a href="user.php">Utilizatori</a><br>
            <a href="add_1.php">Add Personaje</a><br>
            <a href="add_2.php">Add Aparitii </a><br>
            <a href="add_3.php">Add Abil_spec</a><br>
            <a href="add_4.php">Add Adversari</a><br>
            <a href="add_5.php">Add Creat_salb</a><br>
            <a href="\PROIECT_FINAL/logout.php" >Deconectare</a>
        </nav>
        <br>

    	<section>
            <h2> Editezi Abilitati Speciale: </h2>
            <article>    
        <?php
                   if (isset($_GET['creatura_cod'])) {
                       $creatura_cod = $_GET['creatura_cod'];

                       require("conectare.php");

                       if (isset($_POST['upload'])) {
                           $query = "UPDATE abilitati_spec
                               SET specie='".$_POST['specie']."',
                                abilitati='". $_POST['abilitati'] ."',
                                slabiciuni='". $_POST['slabiciuni']."',
                                goal='". $_POST['goal']."'
                                WHERE creatura_cod=".$creatura_cod;
                           $result=mysqli_query($conexiune, $query);
                           if (!$result) {
                               echo mysqli_error($conexiune);
                           } else {
                                echo "<h2>Modificat cu succes</h2>";
                               echo "<p><a href='admin.php'><-- Admin</a>";
                           }
                       } else {
                           $query = "SELECT *
                               FROM abilitati_spec
                               WHERE abilitati_spec.creatura_cod=".$creatura_cod;

                           $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                           $row=mysqli_fetch_assoc($rezultat);
                           ?>
                           <form action="edd_3.php?creatura_cod=<?=$creatura_cod?>" method="POST" enctype="multipart/form-data">
                                <div>
                                    <label for="specie">Specie -></label>
                                    <input type="text" name="specie" id="specie" value="<?=$row["specie"]?>" >
                                </div>
                                <div>
                                    <label for="abilitati">Abilitati speciale -> </label>
                                    <input type="text" name="abilitati" id="abilitati" value="<?=$row["abilitati"]?>" >
                                </div>
                                <div>
                                    <label for="slabiciuni">Slabiciuni -> </label>
                                    <input type="text" name="slabiciuni" id="slabiciuni" value="<?=$row["slabiciuni"]?>" >
                                </div>
                                <div>
                                    <label for="goal">Goal -> </label>
                                    <input type="text" name="goal" id="goal" value="<?=$row["goal"]?>" >
                                </div>
                                <div>
                                <br>
                                <div>
                                <button class="button" type="submit" name="upload">Editeaza</button>
                              </div>
                            </form>
                            <?php
                        }
                        mysqli_close($conexiune);
                    } else {
                        echo "<p>Nu ai selectat nimic</p>";
                        echo "<p><a href='admin.php'><-- Admin </a></p>";
                    }
                ?>

    		</article>

    	</section>

    </div>