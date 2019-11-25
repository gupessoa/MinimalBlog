<?php
    //starting session
    session_start();
    //bd import
    require "pages/config.php";

    if(isset($_SESSION["id"]) && !empty($_SESSION['id'])){
        $id = addslashes($_SESSION["id"]);
        $query = "SELECT * FROM users WHERE id = ?";
        $query = $pdo->prepare($query);
        $query->execute(array($id));

        if($query->rowCount()>0){
            $user = $query->fetch();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/css/lib/normalize.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="container">
            <div class="brand">
                <h1>adm.</h1>
            </div>
            <ul class="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="seo.php">Seo</a></li>
                <li><a href="users.php">Seo</a></li>
                <li><a href="posts.php">Posts</a></li>
                <li><a href="contatos.php">Contatos</a></li>
            </ul>
            <a href="#" class="user"><img src="assets/img/sair.png" alt=""></a>
        </nav>
    </header>
    <main class="container">

    </main>
    <footer>
        <div class="container">
            <p>&copy; 2019 CodNome.com.br</p>
            <p><a href="">Termos Legais</a></p>
        </div>
    </footer>
</body>
</html>
<?php 
        }
    }else{
        header("Location : ../index.php");
    }
?>