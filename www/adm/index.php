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
                <li><a href="index.php">Home</a></li>
                <li><a href="pages/seo.php">Seo</a></li>
                <li><a href="pages/users.php">Usuários</a></li>
                <li><a href="pages/posts.php">Posts</a></li>
                <li><a href="pages/contatos.php">Contatos</a></li>
            </ul>
            <a href="#" class="user"><img src="assets/img/sair.png" alt=""></a>
        </nav>
    </header>
    <main class="container">
        <aside class="perfil">
            <img src="assets/img/calvin_foto.jpg" alt="">
            <h1><?php echo $user["nome"]; ?></h1>
            <button class="btnPerfil">Editar Perfil</button>
            <fieldset>
                <legend>Perfil</legend>
                <h2>Quem sou eu?</h2>
                <p>Aqui tem uam pequena descrição sobre quem eu sou na empresa e também 
                    sobre um pouco do meu lado pessoa.</p>
            </fieldset>
        </aside>
        <section class="content">
            <header>
                <div class="titulo">
                    <h1>Hola, <?php echo $user["nome"]?>!</h1>
                    <h2>Último Login: 20 de Setembro de 2018</h2>
                </div>
                <button class="btn">Reportar Bug</button>
            </header>
            <div class="mainContent">
                <h2>Últimos Contatos</h2>
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Gustavo Fickert Pessoa</td>
                            <td>gupessoa@live.com</td>
                            <td><time datetime="2018-09-03">03 Set 2018</time></td>
                            <td><a href="" class="btnDetalhes" data-tipo="contato">[+ Detalhes]</a></td>
                        </tr>
                        <tr>
                            <td>Vanilson Fickert Graciose</td>
                            <td>vfickert@yahoo.com.br</td>
                            <td><time datetime="2018-09-03">03 Set 2018</time></td>
                            <td><a href="" class="btnDetalhes" data-tipo="contato">[+ Detalhes]</a></td>
                        </tr>
                        <tr>
                            <td>Gustavo Fickert Pessoa</td>
                            <td>gupessoa@live.com</td>
                            <td><time datetime="2018-09-03">03 Set 2018</time></td>
                            <td><a href="" class="btnDetalhes">[+ Detalhes]</a></td>
                        </tr>
                        <tr>
                            <td>Vanilson Fickert Graciose</td>
                            <td>vfickert@yahoo.com.br</td>
                            <td><time datetime="2018-09-03">03 Set 2018</time></td>
                            <td><a href="" class="btnDetalhes">[+ Detalhes]</a></td>
                        </tr>
                    </tbody>
                </table>

                <h2>Últimos Posts</h2>
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Data</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pensamentos Soltos</td>
                            <td>Gustavo Fickert Pessoa</td>
                            <td><time datetime="2018-09-03">03 Set 2018</time></td>
                            <td><a href="" class="btnDetalhes" data-tipo="post">[+ Detalhes]</a></td>
                        </tr>
                        <tr>
                            <td>Manaus - Uma experiência única</td>
                            <td>Vanilson Fickert Graciose</td>
                            <td><time datetime="2018-09-03">03 Set 2018</time></td>
                            <td><a href="" class="btnDetalhes" data-tipo="post">[+ Detalhes]</a></td>
                        </tr>
                        <tr>
                            <td>More Than Words</td>
                            <td>Gustavo Fickert Pessoa</td>
                            <td><time datetime="2018-09-03">03 Set 2018</time></td>
                            <td><a href="" class="btnDetalhes" data-tipo="post">[+ Detalhes]</a></td>
                        </tr>
                        <tr>
                            <td>Buenos Aires - Cidade da diversidade</td>
                            <td>Vanilson Fickert Graciose</td>
                            <td><time datetime="2018-09-03">03 Set 2018</time></td>
                            <td><a href="" class="btnDetalhes" data-tipo="post">[+ Detalhes]</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal"> 
                <div class="modalContent">
                    <span class="closeModal">&times;</span>
                    <div class="detalhes">

                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2019 CodNome.com.br</p>
            <p><a href="">Termos Legais</a></p>
        </div>
    </footer>
    <script src="assets/js/script.js"></script>
</body>
</html>
<?php 
        }
    }else{
        header("Location : ../index.php");
    }
?>