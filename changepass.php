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