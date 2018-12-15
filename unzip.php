
<?php
  ## function to unzip OA
    require_once "pdo.php";
    session_start();

    $filepath = $_POST["zip_path"];
    $name = basename($filepath);
    $zip = new ZipArchive;
    $descomp = $_SESSION["userID"] . '-' . $_SESSION["userType"];
    mkdir("$descomp", 0700);
   
        $zip->extractTo("oa/$descomp/$filepath");
        $zip->close();
        $sql = "INSERT INTO rutaoa (idUser, idOA, username, rutaoa)
                VALUES (:idUser, :idOA, :username, :rutaoa)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':idUser' => $_SESSION["userID"],
            ':idOA' => $_POST["id"],
            ':username' => $_SESSION["userName"],
            ':rutaoa' => "oa/$descomp/$name/index.html"));
        $_SESSION["oa"] = "Objeto de Aprendizaje descomprimido correctamente.";
    
?>
