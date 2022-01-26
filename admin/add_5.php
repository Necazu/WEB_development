
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
    <link href="css/add.css" rel="stylesheet">
</head>
<body>
  

    <div id="pag">
    	<header id="h1">
        <div id="poz1">
                <img src="img/logo.png" width="200px" id="poz" >
            </div>
    	</header>

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
                
        <article>
    			<header>
    				<h2>Introduceti Creaturi Salbatice: </h2>
    			</header>


                <?php

                        require("conectare.php");

                        if (isset($_POST['upload'])) {

                            $nume = $_POST['unde_o_gasesti'];
                            $prenume = $_POST['ce_poti_obtine'];
                            $query = "INSERT INTO creatura_salb (unde_o_gasesti,ce_poti_obtine)
                                VALUES ('$unde_o_gasesti', '$ce_poti_obtine');";
                            
                            $result=mysqli_query($conexiune, $query);

                            if (!$result) {
                            	echo mysqli_error($conexiune);
                            } else {
                             	echo "<h2>Adaugat</h2>";
                                echo "<a href='admin.php'> <-- Admin</a>";

                            }
                        } else {
                            ?>
                          <form method="POST" action="add_1.php" enctype="multipart/form-data">

                                <div>
                                    <label for="nume">Localizare->></label>
                                    <input type="text" name="unde_o_gasesti" id="unde_o_gasesti" value="" >
                                </div>
                                <div>
                                    <label for="nume">Lucruri pe care le poti obtine->></label>
                                    <input type="text" name="ce_poti_obtine" id="ce_poti_obtine" value="" >
                                </div>
                                <br>
                                <div>
                                    <button class="button" type="submit" name="upload">Adauga</button>
                                </div>

                            </form>

                            <?php
                        }
                        mysqli_close($conexiune);
                ?>

    		</article>

    	</section>
     
    </div>
</body>
</html>