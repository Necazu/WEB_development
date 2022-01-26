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
<?php
        $action = "view";
        if (isset($_GET['id'])) {
            $lista = false;
            $id = $_GET['id'];
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
        }
        require("conectare.php");
    ?>

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
       
        <?php
                    if ($action == "view") {
                        
                ?>
              
                    <table>
                        <tr>
                          <th>Id</th>
                          <th>Username</th>
                          <th>Data creare</th>
                          <th>Șterge</th>
                        </tr>
                        <h2> Utilizatori:</h2>
                        <?php
                            $query = "SELECT * FROM users order by id ASC";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) {
                                $rezultat = mysqli_query($conexiune, $query) or die ('Eroaree');
                            while($row = mysqli_fetch_assoc($rezultat)) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["created_at"] . "</td>";
                                echo "<td><a href='user.php?id=" . $row['id'] . "&action=delete'>sterge</a></td>";
                                echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>Nu aveti user</td></tr>";
                            }
                         ?>
                    </table>
                  
                   
                <?php
                } else {
                    if ($action == "delete") {
                        //delete record
                        $query = "DELETE from users where id=".$id;
                        $result=mysqli_query($conexiune, $query);
                        if (!$result) {
                            echo mysqli_error($conexiune);
                        } else {
                            echo "<h2>Ștergere efectuată!</h2>";
                            echo "<meta http-equiv=\"refresh\" content=\"2; URL='user.php'\" >";

                        }
                    }

                }
                mysqli_close($conexiune);
                ?>
                        
                    </table>
    	</section>
     
    </div>

</body>
</html>
