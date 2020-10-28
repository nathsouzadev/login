<?php
    session_start();

    if(!isset($_SESSION['nome'])){
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/global.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <title>Logado | Demo</title>
</head>
<body>
    <h1>Você está logado</h1>
    <p><?php echo $_SESSION['nome']; ?> entrou!</p>
    <h2><a href="index.php">Home</a></h2>
    <h3><a href="cadastro.php">Cadastrar novo usuário</a></h3>
    <a href="<?php session_destroy(); ?>">Sair</a>
</body>
</html>