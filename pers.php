<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE HTML>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index</title>
    <link href="css/pers_.css" rel="stylesheet">
</head>
<body>
    <div id="pag">
    	<header id="h1">
            <div id="poz1">
                <img src="img/logo.png" width="200px" id="poz" >
                <img src="img/logo.png" width="120px" id="poz_m" >
            </div>

            <span id="span_pc" style="font-size:30px;cursor:pointer" onclick="openNav()"><img src="img/menu.gif" width="200px"> </span>
            <span id="span_a" style="font-size:30px;cursor:pointer" onclick="openNav()"><img src="img/menu.gif" width="130px"> </span>

    	</header><br><br>
    
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php">Acasa</a>
            <a href="pers_2.php">Creaturi mitice</a>
            <a href="pers_3.php">Vanatoare creaturi</a>
            <a href="pers_4.php">Personaje</a>
            <br> <br><br> <br><br> 
            <h3><?php echo htmlspecialchars($_SESSION["username"]); ?></h3>
            <a href="reset-password.php">Resetare parola</a>
            <a href="logout.php" >Deconectare</a>
          </div>

    	<section>
        <div id="fundal">
       <table>
        <?php
                   if (isset($_GET['id'])) {
                       $id = $_GET['id'];

                       require("conectare.php");
                       $query = "select `Nume`,`Prenume`, `Varsta`,`poza`,`Abilitati`,`Slabiciuni`,
                       `Goal`,`episod_ap`,`episod_disp`,`Inspiratie`, `Citat`
                       from vederea_doi
                       where `id`='$id';";
                       $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                       if (mysqli_num_rows($rezultat) > 0) 
                       {
                       while($row = mysqli_fetch_assoc($rezultat)) 
                       {
                           echo "<tr>";
                           echo "<tr> Nume : " . $row["Nume"],$row["Prenume"]."</tr>";
                           echo "<img id='perso' src='img/pers/".$row['poza']."'><br><br>";
                           echo "<td> Citat : " . $row["Citat"] . "<br><br></td>";
                           echo "<td> Varsta : " . $row["Varsta"] . " Ani<br></td>";
                           echo "<td>  Abilitati : " . $row["Abilitati"] . "<br></td>";
                           echo "<td> Slabiciuni : " . $row["Slabiciuni"] . "<br></td>";
                           echo "<td> Scop : " . $row["Goal"] . "<br></td>";
                           echo "<td> Episod aparitie : " . $row["episod_ap"] . "<br></td>";
                           echo "<td> Episod disparitie : " . $row["episod_disp"] . "<br></td>";
                           echo "Inspiratie : " . $row["Inspiratie"] . "<br> <br>";
                           echo "</tr>";
                           }
                       }
                       mysqli_close($conexiune);
                    }
        ?>
          </table>
            </div>
        </section>
            
    </div>

    <footer>
        <p>Cpy 2021 Mihut Bogdan</p>
    </footer>
    <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
    </script>

</body>
</html>

