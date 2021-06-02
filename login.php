<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
?>

<html lang="pt-BR">

    <head>
        <meta charset="utf-8">
        <title>Login Garagem Do Rock</title>
        <link rel="stylesheet" href="css/cadastrar.css">
    </head>

    <body>

        <div id="corpo-form">
            <h1>Entrar</h1>
            <form method="POST">
                <input type="email" name="email" placeholder="usuario">
                <input type="password" name="senha" placeholder="senha">
                <input type="submit" value="ACESSAR">
                <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se!</strong>
            </form>
        </div>
<?php
    if (isset($_POST['email'])) {

        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if ( !empty($email) && !empty($senha) ) {
            $u->conectar("bd_projeto_vaga_fullstack", "localhost", "root", "");
            if($u->msgErro == ""){
                if($u->logar($email,$senha)){
                    header ("location: AreaPrivada.php");
                } else{
                    ?>
                    <div class="msg-erro"> Email e/ou senha estão incorretos!</div>
                    <?php
                }
            }else{
                ?>
                <div class="msg-erro"> 
                    <?php echo"Erro: ".$u->msgErro; ?>
                </div>
                <?php
            }
        }else{
            ?>
            <div class="msg-erro"> Pereencha todos os campos!</div>
       <?php
        }
    }
     
    ?>
    </body>

</html>