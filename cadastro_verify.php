<?php
    require_once('conection.php');
    $dados = [$_POST['nome'], $_POST['email'], $_POST['password1'], $_POST['password2'], $_POST['image']];
    if (strlen($dados[0]) < 3) { //name min three chars
        echo"<script>alert('Nome deve conter no mínimo três caracteres')</script>";
    } else if (strlen($dados[2]) < 6){ //password min six chars
        echo"<script>alert('Senha deve conter no mínimo seis caracteres')</script>";
    } else if ($dados[2] != $dados[3]){ //password as a confirm password
        echo"<script>alert('Senhas digitadas não são iguais')</script>";
    } else { //verify email
        $emailv = str_split($dados[1]);
        $count = 0;
        foreach ($emailv as $key) {
            if ($key == '@') {
                $count++;
            }
        }
        if ($count > 0) {
            $sql = "select email from usuarios where email = '$dados[1]'";
            $result = $conn->query($sql);
            $user = mysqli_fetch_all($result);
            if (count($user) == 0) { //success submit data
                $usuario = $_POST['nome'];
                $email = $_POST['email'];
                $senha = md5($_POST['password1']);
                $image = $_POST['image'];

                $sql = "insert into usuarios (usuario, senha, email, image) values ('$usuario', '$senha', '$email', '$image')";
                $result = $conn->query($sql);
                echo"<script>alert('Dados cadastrados')</script>";
                echo"<script>location.href = 'index.php'</script>";
            } else {
                echo"<script>alert('E-mail já cadastrado')</script>";
            }
        } else {
            echo"<script>alert('Insira um e-mail válido')</script>";
        }
    }
    echo"<script>location.href = 'cadastro.php'</script>";