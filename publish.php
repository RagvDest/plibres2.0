<?php
require_once "pdo.php";
    session_start();

      $publicar="";
      $post="";

      if(isset($_POST['publicar']))$publicar=$_POST['publicar'];
      if(isset($_POST['post']))$post=$_POST['post'];

      if(isset($_POST['publicar']) && isset($_POST['post']))
      {
        $sql = "INSERT INTO post (contenido, idusuario)
            VALUES (:post, :idusuario)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(:post,$post);
        $stmt->bindParam(:idusuario,$_SESSION["userID"]);
        $stmt->execute();
        /*unset($_POST['publicar']);
        unset($_POST['post']);
        hearder('Location: crearBlog.php');*/
        return;
      }


?>