<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php");
    exit;
}

require_once "config.php";

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(empty(trim($_POST["new_password"])))
    {
        $new_password_err = "Introdu parola noua.";     
    } 
    elseif(strlen(trim($_POST["new_password"])) < 6)
    {
        $new_password_err = "Trebuie sa fie mai lunga de 6 caractere.";
    } else
    {
        $new_password = trim($_POST["new_password"]);
    }

    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Confirma parola.";
    } 
    else
    {
        $confirm_password = trim($_POST["confirm_password"]);

        if(empty($new_password_err) && ($new_password != $confirm_password))
        {
            $confirm_password_err = "Parolele nu se potrivesc.";
        }
    }

    if(empty($new_password_err) && empty($confirm_password_err))
    {

        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            if(mysqli_stmt_execute($stmt))
            {

                session_destroy();
                header("location: login.php");
                exit();
            } 
            else
            {
                echo "Eroare 404 Reveniti mai tarziu.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">      
    <link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/reset-password.css">
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
        <h2>Resetare Parola</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <h3>Parola noua</h3>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <h3>Confirma Parola</h3>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <button class="button" type="submit" name="upload" value="Submit">Schimbare</button>
               <button class="button" >  <a href="index.php"> Anulare</a></button>
            </div>
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