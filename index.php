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
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <div id="pag">
    	<header id="h1">
            <div id="poz1">
                <img src="img/logo.png" width="200px" id="poz" >
                <img src="img/logo.png" width="120px" id="poz_m" >
                <h2>Personaje</h2>
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
            <div id="main_two">
                <img src="img/roata.jpg" height="394" width="700" usemap="#hidden" id="hidden">
                <map id="hidden" name="hidden">

                <?php
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=1";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>

                <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '>
                <area shape='poly' coords='252,46,264,38,286,29,311,22,336,18,355,17,351,62,333,63,310,68,293,73,281,81,275,86' onmouseover='document.getElementById(`hidden`).src= `img/roata/ochelari.jpg`;' onmouseout=' document.getElementById(`hidden`).src= `img/roata.jpg`;'></a></td>";

                                    echo "</tr>";
                                }
                            }
                            mysqli_close($conexiune); ?> 

                <?php
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=2";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>            
                <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '>

                    <area shape='poly' coords='358,17,376,19,402,25,429,36,452,50,464,59,433,92,421,82,403,74,384,68,369,64,353,64' onmouseover=' document.getElementById(`hidden`).src=`img/roata/intrebare.jpg`;' onmouseout='document.getElementById('hidden').src= 'img/roata.jpg';'>
                    
                    </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?>  


            <?php
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=3";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>            
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '>

                    <area shape='poly' coords='466,61,488,81,507,109,517,130,523,148,481,161,476,146,468,128,454,111,444,99,434,95'  onmouseover='document.getElementById(`hidden`).src=`img/roata/gheata.jpg`;' onmouseout=' document.getElementById(`hidden`).src=`img/roata.jpg`;'>

                    </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?>                     



            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=4";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>            
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '>

                    <area shape='poly' coords='525,151,529,171,532,196,529,224,523,252,519,262,476,247,482,229,486,205,485,183,483,172,482,164'  onmouseover=' document.getElementById(`hidden`).src= `img/roata/mmm.jpg`;' onmouseout=' document.getElementById('hidden`).src= `img/roata.jpg`;'>
                    
                    </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?>    

            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=5";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '>
                    <area shape='poly' coords='518,265,510,283,497,303,483,321,462,340,449,348,425,312,436,303,448,292,461,276,471,259,475,249'  onmouseover=' document.getElementById(`hidden`).src= `img/roata/bradut.jpg`;' onmouseout=' document.getElementById(`hidden`).src= `img/roata.jpg`;'>
                    
                    </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 

            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=6";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '>

                    <area shape='poly' coords='447,350,433,359,410,368,383,377,355,380,342,380,347,335,362,334,382,332,403,325,415,319,423,314' onmouseover=' document.getElementById(`hidden`).src= `img/roata/stea.jpg`;' onmouseout=' document.getElementById(`hidden`).src= `img/roata.jpg`;'>
                   
                    </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 

              <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=7";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> 

                    <area shape='poly' coords='339,379,315,376,280,366,256,354,238,341,266,306,282,315,301,325,321,332,336,334,345,334' onmouseover=' document.getElementById(`hidden`).src= `img/roata/mana.jpg`;' onmouseout='document.getElementById(`hidden`).src= `img/roata.jpg`;'>
                   
                    </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?>  

            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=8";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> 
                       
                    <area shape='poly' coords='235,339,224,329,211,315,201,302,190,285,181,268,174,249,218,236,224,253,231,265,238,276,247,290,258,300,264,305' onmouseover=' document.getElementById(`hidden`).src= `img/roata/lama.jpg`;' onmouseout=' document.getElementById(`hidden`).src= `img/roata.jpg`;'>
                    
                    </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?>  

            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=9";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> 
            
                    <area shape='poly' coords='180,135,174,152,170,176,168,202,170,233,174,247,217,233,214,215,213,197,213,177,217,162,220,152' onmouseover=' document.getElementById(`hidden`).src= `img/roata/stea_c.jpg`;' onmouseout=' document.getElementById(`hidden`).src= `img/roata.jpg`;'>
                   
                    </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 

            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=10";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> 

                    <area shape='poly' coords='182,132,192,107,210,83,234,59,250,47,271,86,259,95,249,106,239,117,232,129,225,142,221,150' onmouseover=' document.getElementById(`hidden`).src= `img/roata/inima.jpg`;' onmouseout=' document.getElementById(`hidden`).src= `img/roata.jpg`;'>
                   
                    </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 
                
                
                </map>

            </div>

            <div id="tabel">
            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=1";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> <img src='img\andr\ochelari.png' id='mana'> </a></td>";
                    echo "</tr>";
                }
            }
                 mysqli_close($conexiune); ?> 
            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=2";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> <img src='img\andr\intrebare.png' id='mana'> </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 

            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=3";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> <img src='img\andr\ice.png' id='mana'> </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 

            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=4";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> <img src='img\andr\stan.png' id='mana'> </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 
            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=5";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> <img src='img\andr\bradut.png' id='mana'> </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 
            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=6";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> <img src='img\andr\stea.png' id='mana'> </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 
   <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=7";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> <img src='img\andr\mana.png' id='mana'> </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 


            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=8";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> <img src='img\andr\lama.png' id='mana'> </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 
             <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=9";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> <img src='img\andr\stea_c.png' id='mana'> </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 
            <?php   
                            require("conectare.php");  
                            $query = "SELECT * FROM personaje where id=10";
                            $rezultat = mysqli_query($conexiune, $query) or die ('Eroare_0');
                            if (mysqli_num_rows($rezultat) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($rezultat)) 
                                {
                                    echo "<tr>";
                         ?>  
            <?php echo "<td><a href='pers.php?id=" . $row['id'] . " '> <img src='img\andr\inima.png' id='mana'> </a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conexiune); ?> 
        </div>
    	</section>
       <a href="bill.php"> <div id="glitch">  <img src="img/g1.gif" width="100px"> </div> </a>
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

