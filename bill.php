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
    <link href="css/bill_.css" rel="stylesheet">
</head>
<body>
    <div id="pag">
    	<header id="h1">
            <div id="poz1">
                <img src="img/logo.png" width="200px" id="poz" >
                <img src="img/logo.png" width="150px" id="poz_m" >
            </div>

            <span id="span_pc" style="font-size:30px;cursor:pointer" onclick="openNav()"><img src="img/menu.gif" width="200px"> </span>
            <span id="span_a" style="font-size:30px;cursor:pointer" onclick="openNav()"><img src="img/menu.gif" width="130px"> </span>
    	
        </header>
            <br><br>
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
  
        <div class="page">
        <article> 
            <h3 id="titit"> Afla care personaje au puterea pe care tu ti-o doresti </h3>   
            <?php

                require("conectare.php");

                if (isset($_POST['upload'])) 
                {
                    $nume = $_POST['nume'];
                    $query = "SELECT
                    functia_1(personaje.nume,adversari.id_creatura_cast,'$nume')as ceva  
                    FROM personaje
                    JOIN adversari on personaje.id=adversari.id_adv; ";
                    $result=mysqli_query($conexiune, $query);
                    if (!$result) 
                    {
                        echo mysqli_error($conexiune);
                    } else {
                        echo" Lista dusmanilor : ";
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                            echo "" . $row["ceva"]." ";
                            }
                        echo"<a href='bill.php' id='link'><--Inapoi</a>";
                    }
                } else {
                    ?>
                <form method="POST" action="bill.php" enctype="multipart/form-data">

                        <div>
                            <label for="nume">Introdu nume-> </label>
                            <input type="text" name="nume" id="nume" value="" >
                            <button class="button" type="submit" name="upload">Cauta dujmani </button><br>
                            <button class="button2" type="submit" name="upload2">Cauta abilitatea</button><br>
                        </div>

                    </form>

                            <?php
                        }
                        if (isset($_POST['upload2'])) 
                        {
                            $nume = $_POST['nume'];
                            $query = "SELECT
                            functia_2(ce_poti_obtine,'$nume',personaje.nume) as ceva2 
                            FROM creatura_salb
                            JOIN personaje on creatura_salb.specie_id=personaje.id;";
                            $result=mysqli_query($conexiune, $query);
                            if (!$result) 
                            {
                                echo mysqli_error($conexiune);
                            } else {
                                
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    echo " ". $row["ceva2"]."</td>";
                                    }
                                echo"<a href='bill.php'  id='link'><--Inapoi</a>";
                            }
                        } 

                      mysqli_close($conexiune);
                      ?>     

    		</article>

            <div id="mentionate">
                <h3> Scurta poveste: </h3>
                <p>
Bine a??i venit la Gravity Falls Wiki, o enciclopedie colaborativ?? pentru tot ceea ce are leg??tur?? cu Gravity Falls. Gravity Falls este un serial animat Disney Channel. Fra??ii gemeni Dipper ??i Mabel Pines se afl?? ??ntr-o aventur?? nea??teptat?? c??nd ????i petrec vara ??mpreun?? cu unchiul lor mare ??n misteriosul ora?? Gravity Falls, Oregon. La sosirea lor, Dipper ??i unchiul lui Mabel, Grunkle Stan, apeleaz?? la ajutorul fra??ilor pentru a rula The Mystery Shack, o capcan?? turistic?? plin?? de exponate false care suprasolicit?? clien??ii neb??nu??i. De??i Dipper ??i Mabel descoper?? rapid The Mystery Shack ??n sine este o fars??, ei simt c?? este ceva ciudat ??n noul lor ora?? ??i, ??mpreun??, ??ncep s?? deblocheze secretele Gravity Falls. Continua??i s?? verifica??i acest wiki pentru actualiz??ri despre orice ??i orice despre Gravity Falls!</p>
            </div>

                    </div>
                    <div id="loading"></div>
        </section>
    </div>


    <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
////////////////////////////////////////////////////////////////////// animatia
        function onReady(callback) {
  var intervalId = window.setInterval(function() {
    if (document.getElementsByTagName('body')[0] !== undefined) {
      window.clearInterval(intervalId);
      callback.call(this);
    }
  }, 1000);
}

function setVisible(selector, visible) {
  document.querySelector(selector).style.display = visible ? 'block' : 'none';
}

onReady(function() {
  setVisible('.page', true);
  setVisible('#loading', false);
});

    </script>

</body>
</html>

