<?php
    //starting session
    session_start();
    //bd import
    require "config.php";

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
    <link rel="stylesheet" type="text/css" href="../assets/css/lib/normalize.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
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
                <li><a href="users.php">Usuários</a></li>
                <li><a href="posts.php">Posts</a></li>
                <li><a href="contatos.php">Contatos</a></li>
            </ul>
            <a href="#" class="user"><img src="../assets/img/sair.png" alt=""></a>
        </nav>
    </header>
    <main class="container">
        <aside class="perfil">
            <img src="../assets/img/calvin_foto.jpg" alt="">
            <h1>Gustavo Pessoa</h1>
            <button class="btnPerfil">Editar Perfil</button>
            <fieldset>
                <legend>Perfil</legend>
                <h2>Quem sou eu?</h2>
                <p>Aqui tem uam pequena descrição sobre quem eu sou na empresa e também 
                    sobre um pouco do meu lado pessoa.</p>
            </fieldset>
        </aside>
        <section class="content contatos">
            <h1>Contatos</h1>
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
                        <td>Gustavo Fickert Pessoa</td>
                        <td>gupessoa@live.com</td>
                        <td><time datetime="2018-09-03">03 Set 2018</time></td>
                        <td><a href="" class="btnDetalhes" data-tipo="contato">[+ Detalhes]</a></td>
                    </tr> 
                    <tr>
                        <td>Gustavo Fickert Pessoa</td>
                        <td>gupessoa@live.com</td>
                        <td><time datetime="2018-09-03">03 Set 2018</time></td>
                        <td><a href="" class="btnDetalhes" data-tipo="contato">[+ Detalhes]</a></td>
                    </tr> 
                    <tr>
                        <td>Gustavo Fickert Pessoa</td>
                        <td>gupessoa@live.com</td>
                        <td><time datetime="2018-09-03">03 Set 2018</time></td>
                        <td><a href="" class="btnDetalhes" data-tipo="contato">[+ Detalhes]</a></td>
                    </tr>
                    <tr>
                        <td>Gustavo Fickert Pessoa</td>
                        <td>gupessoa@live.com</td>
                        <td><time datetime="2018-09-03">03 Set 2018</time></td>
                        <td><a href="" class="btnDetalhes" data-tipo="contato">[+ Detalhes]</a></td>
                    </tr>
                    <tr>
                        <td>Gustavo Fickert Pessoa</td>
                        <td>gupessoa@live.com</td>
                        <td><time datetime="2018-09-03">03 Set 2018</time></td>
                        <td><a href="" class="btnDetalhes" data-tipo="contato">[+ Detalhes]</a></td>
                    </tr>
                    <tr>
                        <td>Gustavo Fickert Pessoa</td>
                        <td>gupessoa@live.com</td>
                        <td><time datetime="2018-09-03">03 Set 2018</time></td>
                        <td><a href="" class="btnDetalhes" data-tipo="contato">[+ Detalhes]</a></td>
                    </tr>
                    <tr>
                        <td>Gustavo Fickert Pessoa</td>
                        <td>gupessoa@live.com</td>
                        <td><time datetime="2018-09-03">03 Set 2018</time></td>
                        <td><a href="" class="btnDetalhes" data-tipo="contato">[+ Detalhes]</a></td>
                    </tr>
                    <tr>
                        <td>Gustavo Fickert Pessoa</td>
                        <td>gupessoa@live.com</td>
                        <td><time datetime="2018-09-03">03 Set 2018</time></td>
                        <td><a href="" class="btnDetalhes" data-tipo="contato">[+ Detalhes]</a></td>
                    </tr>
                </tbody>
            </table>
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
    <script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>
<?php 
        }
    }else{
        header("Location : ../index.php");
    }
?>