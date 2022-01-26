
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
            <h2> Editezi Aparitii: </h2>
            <article>    
        <?php
                   if (isset($_GET['id_p'])) {
                       $id_p = $_GET['id_p'];

                       require("conectare.php");

                       if (isset($_POST['upload'])) {
                           $query = "UPDATE aparitie
                               SET episod_ap='".$_POST['episod_ap']."',
                                episod_disp='". $_POST['episod_disp'] ."',
                                citat='". $_POST['citat']."'
                                WHERE id_p=".$id_p;
                           $result=mysqli_query($conexiune, $query);
                           if (!$result) {
                               echo mysqli_error($conexiune);
                           } else {
                                echo "<h2>Modificat cu succes</h2>";
                               echo "<p><a href='admin.php'><-- Admin</a>";
                           }
                       } else {
                           $query = "SELECT *
                               FROM aparitie
                               WHERE aparitie.id_p=".$id_p;

                           $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                           $row=mysqli_fetch_assoc($rezultat);
                           ?>
                           <form action="edd_2.php?id_p=<?=$id_p?>" method="POST" enctype="multipart/form-data">
                                <div>
                                    <label for="episod_ap">Episod aparitie -></label>
                                    <input type="text" name="episod_ap" id="episod_ap" value="<?=$row["episod_ap"]?>" >
                                </div>
                                <div>
                                    <label for="episod_disp">Episod Disparitie -> </label>
                                    <input type="text" name="episod_disp" id="episod_disp" value="<?=$row["episod_disp"]?>" >
                                </div>
                                <div>
                                    <label for="citat">Citat -> </label>
                                    <input type="text" name="citat" id="citat" value="<?=$row["citat"]?>" >
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

</body>
</html>