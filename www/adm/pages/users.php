<?php
session_start();
    require "config.php";

    if(isset($_SESSION["id"]) && !empty($_SESSION['id'])){
        $id = addslashes($_SESSION["id"]);
        $query = "SELECT * FROM users WHERE id = ?";
        $query = $pdo->prepare($query);
        $query->execute(array($id));

        if($query->rowCount()>0) {
            $user = $query->fetch();
        }
        $content = file_get_contents("php://input");
        //tranformamos o conteudo recebido em JSON em um array php
        $decoded = json_decode($content, true);
        //pegamos as informações e atribuindo elas as variaveis
        $email = addslashes($decoded['email']);
        $nome = addslashes($decoded['nome']);
        $senha = addslashes($decoded['senha']);
        if(isset($email) && !empty($email)){
//            //Alterando o cabeçalho para não gerar cache do resultado
//            header('Cache-Control: no-cache, must-revalidate');
//            //Alterando o cabeçalho para que o retorno seja do tipo JSON
//            header('Content-Type: application/json; charset=utf-8');
            //pegamos as informações e atribuindo elas as variaveis
            $senha = md5($decoded['senha']);
            //fazendo os procedimentos no banco de dados
            $query = "INSERT INTO users SET nome=?, email=?, senha=?";
            $query = $pdo->prepare($query);
            $query->execute(array($nome, $email, $senha));
            if($query->rowCount()>0){
                $usuario = $query->fetch(PDO::FETCH_ASSOC);
                $info = $usuario["status"]="ok";
                echo json_encode($usuario);
                exit;
            }else{
                echo json_encode(array("status"=>"nok"));
                exit;
            }
        }
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
        <section class="content users">
            <h1>Usuários</h1>
            <div class="containerBtn">
                <a class="btn btnAdd" data-tipo="user" href="">Adicionar Usuário</a>
            </div>
            <table class="tabela">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Nivel de Acesso</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Felipe</td>
                        <td>felipe@codnome.com.br</td>
                        <td>1</td>
                        <td><a href="" class="btnDetalhes" data-tipo="user">[+ Detalhes]</a></td>
                    </tr> 
                    <tr>
                        <td>André</td>
                        <td>andre@codnome.com.br</td>
                        <td>1</td>
                        <td><a href="" class="btnDetalhes" data-tipo="user">[+ Detalhes]</a></td>
                    </tr> 
                    <tr>
                        <td>Gustavo</td>
                        <td>gustavo.pessoa@codnome.com.br</td>
                        <td>0</td>
                        <td><a href="" class="btnDetalhes" data-tipo="user">[+ Detalhes]</a></td>
                    </tr> 
                    <tr>
                        <td>Vanilson</td>
                        <td>vanilson@codnome.com.br</td>
                        <td>2</td>
                        <td><a href="" class="btnDetalhes" data-tipo="user">[+ Detalhes]</a></td>
                    </tr>
                    <tr>
                        <td>Felipe</td>
                        <td>felipe@codnome.com.br</td>
                        <td>1</td>
                        <td><a href="" class="btnDetalhes" data-tipo="user">[+ Detalhes]</a></td>
                    </tr>
                    <tr>
                        <td>André</td>
                        <td>andre@codnome.com.br</td>
                        <td>1</td>
                        <td><a href="" class="btnDetalhes" data-tipo="user">[+ Detalhes]</a></td>
                    </tr>
                    <tr>
                        <td>Gustavo</td>
                        <td>gustavo.pessoa@codnome.com.br</td>
                        <td>0</td>
                        <td><a href="" class="btnDetalhes" data-tipo="user">[+ Detalhes]</a></td>
                    </tr>
                    <tr>
                        <td>Vanilson</td>
                        <td>vanilson@codnome.com.br</td>
                        <td>2</td>
                        <td><a href="" class="btnDetalhes" data-tipo="user">[+ Detalhes]</a></td>
                    </tr>

                </tbody>
            </table>
            <div class="modal"> 
                <div class="modalContent">

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
    <script src="../assets/js/script.js"></script>

</body>
</html>
<?php
    }else{
           header("Location: http://localhost/MinimalBlog/www/index.php");
    }
?>