<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: \PROIECT_FINAL/login.php");
    exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
    <link href="css/admincss.css" rel="stylesheet">
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
                 <table>
                        <tr>
                          <th>Nume</th>
                          <th>Email</th>
                          <th>Comentarii</th>
                          <th>Editeaza</th>
                        </tr>
                        <h2> Nume tabela</h2>
                        <?php
                            $query = "SELECT * FROM contact order by id ASC";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) {
                            while($row = mysqli_fetch_assoc($rezultat)) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["nume"] . "</td>";
                                echo "<td>" . $row["prenume"] . "</td>";
                                echo "<td>" . $row["varsta"] . "</td>";
                                echo "<td><a href='edd_1.php?id=" . $row['id'] . " '><img src='img/edit.png' alt='edit icon' width='32px'></a></td>";
                                echo "</tr>";
                                }
                            }
                          
                            mysqli_close($conexiune);
                         ?>
                    </table>

                    <br>  <br>  <br>
                   
                    <table>
                        <tr>
                          <th>Id</th>
                          <th>Episod Ap</th>
                          <th>Episod Dis</th>
                          <th>Citat</th>
                          <th>Editeaza</th>
                        </tr>
                        <h2> Aparitii</h2>
                        <?php
                            require("conectare.php");  
                            $query_1 = "SELECT * FROM aparitie order by id_p ASC";
                            $rezultat_1 = mysqli_query($conexiune, $query_1) or die ('Eroare_1');
                            if (mysqli_num_rows($rezultat) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($rezultat_1)) {
                                echo "<tr>";
                                echo "<td>" . $row["id_p"] . "</td>";
                                echo "<td>" . $row["episod_ap"] . "</td>";
                                echo "<td>" . $row["episod_disp"] . "</td>";
                                echo "<td>" . $row["citat"] . "</td>";
                                echo "<td><a href='edd_2.php?id_p=" . $row['id_p'] . " '><img src='img/edit.png' alt='edit icon' width='32px'></a></td>";
                                echo "</tr>";
                            }
                        }
                                mysqli_close($conexiune);
                         ?>
                    </table>

                    <br>  <br>  <br>
                   
                    <table>
                        <tr>
                          <th>Cod</th>
                          <th>Specie</th>
                          <th>Abilitati</th>
                          <th>Slabiciuni</th>
                          <th>Goal</th>
                          <th>Editeaza</th>
                        </tr>
                        <h2> Abilitati Speciale</h2>
                        <?php
                            require("conectare.php");  
                            $query = "SELECT * FROM abilitati_spec order by creatura_cod ASC";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_1');
                            if (mysqli_num_rows($rezultat) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($rezultat)) {
                                echo "<tr>";
                                echo "<td>" . $row["creatura_cod"] . "</td>";
                                echo "<td>" . $row["specie"] . "</td>";
                                echo "<td>" . $row["abilitati"] . "</td>";
                                echo "<td>" . $row["slabiciuni"] . "</td>";
                                echo "<td>" . $row["goal"] . "</td>";
                                echo "<td><a href='edd_3.php?creatura_cod=" . $row['creatura_cod'] . " '><img src='img/edit.png' alt='edit icon' width='32px'></a></td>";
                                echo "</tr>";
                            }
                        }
                                mysqli_close($conexiune);
                         ?>
                    </table>
                    
                    <br>  <br>  <br>
                   
                    <table>
                        <tr>
                          <th>Cod</th>
                          <th>Castigator</th>
                          <th>Episod Confruntare</th>
                          <th>Editeaza</th>
                        </tr>
                        <h2> Adversari</h2>
                        <?php
                            require("conectare.php");  
                            $query = "SELECT * FROM adversari order by id_adv ASC";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_1');
                            if (mysqli_num_rows($rezultat) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($rezultat)) {
                                echo "<tr>";
                                echo "<td>" . $row["id_adv"] . "</td>";
                                echo "<td>" . $row["id_creatura_cast"] . "</td>";
                                echo "<td>" . $row["ep_confruntare"] . "</td>";
                                echo "<td><a href='edd_4.php?id_adv=" . $row['id_adv'] . " '><img src='img/edit.png' alt='edit icon' width='32px'></a></td>";
                                echo "</tr>";
                            }
                        }
                                mysqli_close($conexiune);
                         ?>
                    </table>
                                        
                    <br>  <br>  <br>
                   
                    <table>
                        <tr>
                          <th>Cod</th>
                          <th>Localizare</th>
                          <th>Obiecte obtinute</th>
                          <th>Editeaza</th>
                        </tr>
                        <h2> Creaturi Salbatice</h2>
                        <?php
                            require("conectare.php");  
                            $query = "SELECT * FROM creatura_salb order by specie_id ASC";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_1');
                            if (mysqli_num_rows($rezultat) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($rezultat)) {
                                echo "<tr>";
                                echo "<td>" . $row["specie_id"] . "</td>";
                                echo "<td>" . $row["unde_o_gasesti"] . "</td>";
                                echo "<td>" . $row["ce_poti_obtine"] . "</td>";
                                echo "<td><a href='edd_5.php?specie_id=" . $row['specie_id'] . " '><img src='img/edit.png' alt='edit icon' width='32px'></a></td>";
                                echo "</tr>";
                            }
                        }
                                mysqli_close($conexiune);
                         ?>
                    </table>

    	</section>
     
    </div>

    <footer>
        <p>Cpy 2021 Mihut Bogdan</p>
    </footer>
</body>
</html>
