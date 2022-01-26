<?php

require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty(trim($_POST["username"])))
    {
        $username_err = "";
    } 
    else
    {

        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "Aceasta parola este folosita.";
                } 
                else
                {
                    $username = trim($_POST["username"]);
                }
            } 
            else
            {
                echo "Eroare 404 Reveniti mai tarziu.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["password"])))
    {
        $password_err = "";     
    } elseif(strlen(trim($_POST["password"])) < 6)
    {
        $password_err = "Parola trebuie sa fie mai lunca de 6 caractere";
    }
     else
     {
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "";     
    } 
    else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "Parolele nu se potrivesc";
        }
    }

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
    {
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql))
        {

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 

            if(mysqli_stmt_execute($stmt))
            {
                header("location: login.php");
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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inregistreaza-te</title>

    <link href="css/register.css" rel="stylesheet">
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


        <h2>Inregistreaza-te</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <h3>Username</h3>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <h3>Parola</h3>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <h3>Confirmare Parola</h3>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <button class="button" type="submit" name="upload" value="Submit">Creaza</button>
                <button class="button" type="reset" name="reset" value="Reset">Resetare</button>
            </div>
            <h3 id="eroare">Ai deja un cont? <a href="login.php">-Login-</a></h3>
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