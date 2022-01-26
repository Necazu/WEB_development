<?php
// incepe sesiunea
session_start();
 
// verifici daca nu este logat deja in pagina
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// facem conectarea
require_once "config.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// daca apesi pe buton
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // verifica numele 
    if(empty(trim($_POST["username"]))){
        $username_err = "Introduceti username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // verifica daca are parola
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Introduceti parola.";
    }
     else
    {
        $password = trim($_POST["password"]);
    }

    if($username=='admin' && $password='admin')
    {
        $_SESSION["loggedin"] = true;
        session_start();

        header("location: admin/admin.php");
    }
    else
    {
    
    if(empty($username_err) && empty($password_err))
    {

        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1)
                {                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                           
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            

                            header("location: index.php");
                        } 
                        else
                        {
                            $login_err = "Username sau parola gresita.";
                        }
                    }
                }
                 else
                {

                    $login_err = "Username sau parola gresita.";
                }
            } 
            else
            {
                echo "ERROR 404 Reveniti mai tarziu.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">      
    <link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login_.css">
</head>
<body>
<div id="pag">  
        <header id="h1">
                <div id="poz1">
                    <img src="img/logo.png" width="250px" id="poz" >
                    <img src="img/logo.png" width="200px" id="poz_m" >
                </div>
        </header>

        <section>
			<div id="article">
    		<article>
        <h2>Login</h2>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <h3>Username</h3>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <h3>Parola</h3>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <button class="button" type="submit" name="upload" value="Submit">Accesare</button>
            </div>
            <h3 id="eroare">Nu ai cont? <a href="register.php"><br>--Inregistreaza-te--</a></h3>
        </form>
 
        </article>
			</div>
    	</section>
    </div>  

    <footer>
    <p>Cpy 2021 Mihut Bogdan</p>
</footer>
</body>
</html>