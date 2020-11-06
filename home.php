<?php
    session_start();
    require_once('conection.php');
    if(!isset($_SESSION['nome'])){
        header("Location: index.php");
        exit;
    }

    //post
    if(isset($_POST['msg'])) {
        $autor = $_SESSION['id_user'];
        $msg = $_POST['msg'];
        $sql = "INSERT INTO posts (id_user, post) VALUES ('$autor', '$msg')";
        $result = $conn->query($sql);
        header("Location: home.php");
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title><?php echo $_SESSION['nome'];?> | Home</title>
</head>
<body>
    
    <?php require_once('header.php'); ?>

    <main class="container">
        <form class="form-row mt-5" method="post" validate>
            <input name="msg" class="col-9 form-control" type="text" placeholder="No que você está pensando <?php echo $_SESSION['nome'];?> ?">
            <button class="col-3 btn text-white" type="submit">Publicar</button>
        </form>

        <?php require_once('show_posts.php'); ?>
    </main>
    
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>