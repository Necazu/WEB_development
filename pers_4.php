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
    <link href="css/pers4_.css" rel="stylesheet">
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

        <article>    
        <h3 id="titlu2">Cauta personaje:</h3>
            <?php

                require("conectare.php");

                if (isset($_POST['upload'])) 
                {
                    $nume = $_POST['nume'];
                    $query = "call proc_3('$nume');";
                    $result=mysqli_query($conexiune, $query);
                    if (!$result) 
                    {
                        echo mysqli_error($conexiune);
                    } else {
                     
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                            echo "<tr>";
                            echo "<td id='cap'><br>
                             Nume : " . $row["nume"].$row["prenume"]."</td>";
                           echo "<img id='perso' src='img/pers/".$row['poza']."'><br><br></td>";
                          echo "<td> Citat :". $row["citat"]." <br></td>";
                            echo "<td> Abilitati :". $row["abilitati"]." <br></td>";
                            echo "</tr>";
                            }
                        echo"<a href='pers_4.php' id='link'><--Inapoi</a>";
                    }
                } else {
                    ?>
                <form method="POST" action="pers_4.php" enctype="multipart/form-data">

                        <div>
                            <label for="nume">Nume : </label>
                            <input type="text" name="nume" id="nume" value="" >
                        </div>
                       
                        <br>
                        <div>
                            <button class="button" type="submit" name="upload">Cauta</button><br>
                            <button class="button2" type="submit" name="upload2">Afiseaza personaje principale</button><br>
                            <button class="button3" type="submit" name="upload3">Afiseaza personaje si adversari lor</button>
                        </div>

                    </form>

                            <?php
                        }
                        if (isset($_POST['upload2'])) 
                        {
                            $query = "call proc_2();";
                            $result=mysqli_query($conexiune, $query);
                            if (!$result) 
                            {
                                echo mysqli_error($conexiune);
                            } else {
                                
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                              echo " <table id='pc'> ";
                                    echo "<tr>";
                                    echo "<td id='cap'><br>
                                    Nume : " . $row["nume"].$row["prenume"]."</td>";
                                     echo "<td> Episod Aparitie :". $row["episod_ap"]." <br></td>";
                                    echo "<td> Episod Disparitie :". $row["episod_disp"]." <br></td>";
                                    echo "</tr>";
                                  echo  "</table>";
                                    }
                                echo"<a href='pers_4.php'  id='link'><--Inapoi</a>";
                            }
                        } 
                        if (isset($_POST['upload3'])) 
                        {
                            $query = "call proc_1();";
                            $result=mysqli_query($conexiune, $query);
                            if (!$result) 
                            {
                                echo mysqli_error($conexiune);
                            } else {
                                
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                              echo " <table id='pc'> ";
                                    echo "<tr>";
                                    echo "<td id='cap'><br>
                                    Nume : " . $row["nume"]."";
                                    echo "<img id='perso' src='img/pers/".$row['poza']."'><br><br></td>";
                                    echo "<td> Adversar :". $row["id_creatura_cast"]." <br></td>";
                                    echo "<td> Slabiciuni personaj :". $row["slabiciuni"]." <br></td>";
                                    echo "<td> Episod cofruntare :". $row["ep_confruntare"]." <br></td>";
                                    echo "</tr>";
                                    echo  "</table>";
                                    }
                                echo"<a href='pers_4.php'  id='link'><--Inapoi </a>";
                            }
                        } 



                      mysqli_close($conexiune);
                      ?>     


    		</article>

        
     

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