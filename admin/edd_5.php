
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
            <h2> Editezi Personaje: </h2>
            <article>    
        <?php
                   if (isset($_GET['specie_id'])) {
                       $specie_id = $_GET['specie_id'];

                       require("conectare.php");

                       if (isset($_POST['upload'])) {
                           $query = "UPDATE creatura_salb
                               SET unde_o_gasesti='".$_POST['unde_o_gasesti']."',
                                ce_poti_obtine='". $_POST['ce_poti_obtine'] ."'
                                WHERE specie_id=".$specie_id;
                           $result=mysqli_query($conexiune, $query);
                           if (!$result) {
                               echo mysqli_error($conexiune);
                           } else {
                                echo "<h2>Modificat cu succes</h2>";
                               echo "<p><a href='admin.php'><-- Admin</a>";
                           }
                       } else {
                           $query = "SELECT *
                               FROM creatura_salb
                               WHERE creatura_salb.specie_id=".$specie_id;

                           $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                           $row=mysqli_fetch_assoc($rezultat);
                           ?>
                           <form action="edd_5.php?specie_id=<?=$specie_id?>" method="POST" enctype="multipart/form-data">
                                <div>
                                    <label for="unde_o_gasesti">Unde se gaseste -></label>
                                    <input type="text" name="unde_o_gasesti" id="unde_o_gasesti" value="<?=$row["unde_o_gasesti"]?>" >
                                </div>
                                <div>
                                    <label for="ce_poti_obtine">Unde se poate gasi -> </label>
                                    <input type="text" name="ce_poti_obtine" id="ce_poti_obtine" value="<?=$row["ce_poti_obtine"]?>" >
                                </div>
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

</body>
</html>