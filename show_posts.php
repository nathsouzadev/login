<?php
    require_once('conection.php');
    $id = $_SESSION['id_user'];
    $sql = "SELECT usuarios.usuario, posts.post, posts.tempo from usuarios join posts on usuarios.id_user = posts.id_user where posts.id_user = $id order by posts.id_post desc";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {

        ?>
                
            <div class="card mt-5">
                <div class="card-header">
                    <img class="rounded-circle" src="<?php echo $_SESSION['image'];?>" alt="<?php echo $_SESSION['nome'];?>">
                    <h5 class="card-title"><?php echo $rows['usuario'];?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $rows['post'];?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $rows['tempo'];?></small></p>
                </div>
            </div>
                
        <?php
            }
        }
    else {
        echo"<div class='card mt-5'>
                <div class='card-body'>
                    Você ainda não fez postagens.
                </div>
            </div>";
        }