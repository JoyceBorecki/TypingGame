<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
require_once "conexao.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor, insira o nome de usuário.";
    } else {
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, insira sua senha.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            
            if($stmt->execute()){
            
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            header("location: welcome.php");
                        } else{
                            $login_err = "Nome de usuário ou senha inválidos.";
                        }
                    }
                } else{
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
?>

 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Typing</title>
    <link rel="stylesheet" href="estilizaLogin.css">
 </head>
 <body>

    <div id="frasePrincipal"> 
        <h1>RETRO TYPING</h1>
    </div>

    <div id="container">
        <div id="linhaUm">
            <div class="tecla">A</div>
            <div class="tecla">B</div>
            <div class="tecla">C</div>
            <div class="tecla">D</div>
            <div class="tecla">E</div>
            <div class="tecla">F</div>
            <div class="tecla">G</div>
            <div class="tecla">H</div>
            <div class="tecla">I</div>
            <div class="tecla">J</div>
            <div class="tecla">K</div>
            <div class="tecla">L</div>
            <div class="tecla">M</div>
            <div class="tecla">N</div>
            <div class="tecla">O</div>
            <div class="tecla">P</div>
            <div class="tecla">Q</div>
            <div class="tecla">R</div>
        </div>
        <div id="linhaDois">
            <div class="tecla">S</div>
            <div class="tecla">T</div>
            <div class="tecla">U</div>
            <div class="tecla">V</div>
            <div class="tecla">W</div>
            <div class="tecla">X</div>
            <div class="tecla">Y</div>
            <div class="tecla">Z</div>
            <div class="tecla">a</div>
            <div class="tecla">b</div>
            <div class="tecla">c</div>
            <div class="tecla">d</div>
            <div class="tecla">e</div>
            <div class="tecla">f</div>
            <div class="tecla">g</div>
            <div class="tecla">h</div>
            <div class="tecla">i</div>
            <div class="tecla">j</div>
        </div>
        <div id="linhaTres">
            <div class="tecla">k</div>
            <div class="tecla">l</div>
            <div class="tecla">m</div>
            <div class="tecla">n</div>
            <div class="tecla">o</div>
            <div class="tecla">p</div>
            <div class="tecla">q</div>
            <div class="tecla">r</div>
            <div class="tecla">s</div>
            <div class="tecla">t</div>
            <div class="tecla">u</div>
            <div class="tecla">v</div>
            <div class="tecla">w</div>
            <div class="tecla">x</div>
            <div class="tecla">y</div>
            <div class="tecla">z</div>
        </div>
    </div>

    <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
    ?>

    <form id="formularioLogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="formulario">
            <label>Usuário</label>
            <input type="text" name="username" id="caixaUser" class="<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" autocomplete="off">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>  

        <div class="formulario">  
            <label>Senha</label>
            <input type="password" name="password" id="caixaSenha" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" autocomplete="off">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>

        <div id="cadastro">
            <p>Não tem uma conta? <a href="registro.php">Registre-se</a></p>
            <input type="submit" id="botaoConfirma" value="Entrar">
        </div>
    </form> 

    <script src="login.js"></script>
</body>
</html>