<?php
    session_start();
    require_once('conection.php');
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
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Logado | Demo</title>
</head>
<body>
    
    <header class="container-fluid border shadow">
        <nav class="row container m-auto">
            <div class="col-10 d-flex align-items-center">
                <img class="rounded-circle" src="<?php echo $_SESSION['image'];?>" alt="<?php echo $_SESSION['nome'];?>">
                <h5 class="ml-3 mb-0"><?php echo $_SESSION['nome'];?></h5>
            </div>

            <div class="col-2 d-flex align-items-center justify-content-end">
                <div class="dropdown">
                    <button class="btn text-white dropdown-toggle rounded-circle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="home.php">Home</a>
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </div>
            <div>
            
        </nav>
        
    </header>

    <main class="container">

        <div class="card mt-5">
            <div class="card-header">
                <img class="rounded-circle" src="<?php echo $_SESSION['image'];?>" alt="<?php echo $_SESSION['nome'];?>">
                <h5 class="card-title"><?php echo $_SESSION['nome'];?> - Alterar senha </h5>
            </div>
            <ul class="list-group list-group-flush">
                <form method="post" action="newpassword.php">
                    <div class="form-group">
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Digite a senha atual</label>
                                <div class="col-sm-10">
                                    <input name="password1" type="password" class="form-control" id="inputPassword">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Digite a nova senha</label>
                                <div class="col-sm-10">
                                    <input name="password2" type="password" class="form-control" id="inputPassword">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Repita a nova senha</label>
                                <div class="col-sm-10">
                                    <input name="password3" type="password" class="form-control" id="inputPassword">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                    <div class="col-lg-6">
                                        <a href="perfil.php" class="btn btn-secondary btn-block mt-1">Cancelar</a>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary btn-block mt-1">Salvar nova senha</button>
                                    </div>
                                
                            </div>
                        </li>
                    </div>
                </form>
                
            </ul>

        
        </div>

    </main>
    
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>
<?php
        if(isset($_POST['password1'])){
            $pass = md5($_POST['password1']);
            $pass2 = $_POST['password2'];
            $pass3 = $_POST['password3'];
            $id = $_SESSION['id_user'];
            echo "$pass $pass2, $pass3, $id";
            $sql = "select senha from usuarios where id_user = $id";
            $result = $conn->query($sql);
            $oldpass = mysqli_fetch_all($result);
            print_r($oldpass[0][0]);
            if ($pass != $oldpass[0][0]) {
                echo"<script>alert('Senha atual inválida')</script>";
            }
            else if ($pass2 != $pass3){
                echo"<script>alert('Digite senhas iguais')</script>";
            }
            else if (strlen($pass2) < 6) {
                echo"<script>alert('Senha deve conter no mínimo seis caracteres')</script>";
            }
            else {
                $newpass = md5($pass2);
                $sql = "UPDATE usuarios SET senha='$newpass' WHERE id_user = $id";
                $result = $conn->query($sql);
                echo"<script>alert('Mudei a senha!')</script>";
            }
        }
?>