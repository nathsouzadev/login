<?php
    session_start();
    require_once('conection.php');
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $sql = "select * from usuarios where email = '$email' and senha = '$password';";
        $result = $conn->query($sql);
        $user = mysqli_fetch_all($result);
        //print_r($user[0]);
        if ($result->num_rows == 0){
            echo "<script>alert('Senha e/ou e-mail inválido')
                    location.href='index.php'</script>";
        } else {
            $_SESSION['id_user'] = $user[0][0];
            $_SESSION['nome'] = $user[0][1];
            $_SESSION['senha'] = $user[0][2];
            $_SESSION['email'] = $user[0][3];
            $_SESSION['image'] = $user[0][4];       
            header('Location: home.php');
        }
    }