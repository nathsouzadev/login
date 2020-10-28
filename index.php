<?php require_once('conection.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/global.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <title>Login | Demo</title>
</head>
<body>
    <main>
        <section class="painel-login">

            <div class="card">
                <h1>Entre ou cadastre-se</h1>

                <form method="post" action="./logado.php" onsubmit="validate(event)">
                    <input type="email" id="email" name="email" placeholder="Digite seu email" required>
                    <input type="password" id="password" name="password" placeholder="Digite uma senha" required>
                    <button id="submit" type="submit">Entrar</button>
                    <a href="cadastro.php">Ainda não possui cadastro? Clique aqui</a>
                </form>    
            </div>
            

        </section>

        <section class="painel-img">
            <img src="./images/login.svg" alt="Login">
        </section>
    </main> 
</body>
</html>