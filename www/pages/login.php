<?php
    // Definando variável de coneção do BD
    $pdo;
    // Criando a Conexão de BD'
    try{
    $pdo = new PDO("mysql:dbname=tombo;host=localhost", "root", "");
    }catch(PDOException $e){
    echo "Erro: "+$e->getMessage();
    }
    //Alterando o cabeçalho para não gerar cache do resultado
    header('Cache-Control: no-cache, must-revalidate'); 
    //Alterando o cabeçalho para que o retorno seja do tipo JSON
    header('Content-Type: application/json; charset=utf-8');
    //Pegamos todo o conteúdo da resição AJAX
    $content = file_get_contents("php://input");
    //tranformamos o conteudo recebido em JSON em um array php
    $decoded = json_decode($content, true);
    //pegamos as informações e atribuindo elas as variaveis   
    $email = $decoded['email'];
    $senha = md5($decoded['senha']); 
    //fazendo os procedimentos no banco de dados
    $query = "SELECT * FROM users WHERE email = ? AND senha = ?";
    $query = $pdo->prepare($query);
    $query->execute(array($email, $senha));
    if($query->rowCount()>0){
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        $info = array_unshift($usuario, "ok");
        echo json_encode($usuario);
    }else{
        echo json_encode(array("status"=>"nok"));
    }
        