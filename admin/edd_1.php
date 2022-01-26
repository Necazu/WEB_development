
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

            <h2> Editezi User: </h2>
            <article>    
        <?php
                   if (isset($_GET['id'])) {
                       $id = $_GET['id'];

                       require("coectare.php");

                       if (isset($_POST['upload'])) {
                           $query = "UPDATE contact
                               SET nume='".$_POST['nume']."',
                                mail='". $_POST['mail'] ."',
                                comentarii='". $_POST['comentarii']."'
                                WHERE id=".$id;
                           $result=mysqli_query($conexiune, $query);
                           if (!$result) {
                               echo mysqli_error($conexiune);
                           } else {
                                echo "<h2>Modificat cu succes</h2>";
                               echo "<p><a href='_______.php'><-- Admin</a>";
                           }
                       } else {
                           $query = "SELECT *
                               FROM personcontactaje
                               WHERE contact.id=".$id;

                           $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                           $row=mysqli_fetch_assoc($rezultat);
                           ?>
                           <form action="editez.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
                                <div>
                                    <label for="nume">Nume -></label>
                                    <input type="text" name="nume" id="nume" value="<?=$row["nume"]?>" >
                                </div>
                                <div>
                                    <label for="mail">Mail -> </label>
                                    <input type="text" name="mail" id="mail" value="<?=$row["mail"]?>" >
                                </div>
                                <div>
                                    <label for="comentarii">Comentarii -> </label>
                                    <input type="text" name="comentarii" id="comentarii" value="<?=$row["comentarii"]?>" >
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
                        echo "<p><a href='________.php'><-- Admin </a></p>";
                    }
                ?>

    		</article>

    	</section>

    </div>

</body>
</html>