<?php
	$pdo;
	// Criando a Conexão de BD'
	try{
	$pdo = new PDO("mysql:dbname=tombo;host=localhost", "root", "");
	}catch(PDOException $e){
	echo "Erro: "+$e->getMessage();
	}

	//pegando as informações de email 
	if(isset($_POST["email"]) && !empty($_POST["email"])){
		
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$telefone = addslashes($_POST['tel']);
	$mensagem = addslashes($_POST['msg']);
	$assunto = addslashes($_POST['assunto']);
	$data_envio = date('d/m/Y');
	$hora_envio = date('H:i:s');

	$para = "gustavo.pessoa@codnome.com.br";
	$corpo = "Nome: ".$nome."<br> Email: ".$email."<br>Telefone: ".$telefone."<br>Data: ".$data_envio." ás ".$hora_envio."<hr><strong>".$assunto."</strong><br>".$mensagem;
	$headers  = "MIME-Version: 1.1\n";
	$headers .= "Content-type: text/html; charset=UTF-8\n";
	$headers .= "From: gustavo.pessoa@condome.com.br" . "\n";
	$headers .="Reply-To: ".$email."\n";
	$headers .="Data: ".$data_envio."\n";
	$headers .= "Return-Path: ".$nome." <gustavo.pessoa@codnome.com.br>\n";
	$headers .= "X-Priority:3\n";
	$headers .="X-Mailer: PHP/".phpversion();

	if(!mail($para, $assunto, $corpo, $headers ,"-r".$email)){ // Se for Postfix
		$headers .= "Return-Path: " . $email . $quebra_linha; // Se "não for Postfix"
		mail($para, $assunto, $corpo, $headers );
	}
	}
	$content = file_get_contents("php://input");
	//tranformamos o conteudo recebido em JSON em um array php
	$decoded = json_decode($content, true);
	//pegamos as informações e atribuindo elas as variaveis   
	$email = $decoded['email'];
	if(isset($email) && !empty($email)){
		//Alterando o cabeçalho para não gerar cache do resultado
		header('Cache-Control: no-cache, must-revalidate'); 
		//Alterando o cabeçalho para que o retorno seja do tipo JSON
		header('Content-Type: application/json; charset=utf-8');
		//pegamos as informações e atribuindo elas as variaveis   
		$senha = md5($decoded['senha']); 
		//fazendo os procedimentos no banco de dados
		$query = "SELECT * FROM users WHERE email = ? AND senha = ?";
		$query = $pdo->prepare($query);
		$query->execute(array($email, $senha));
		if($query->rowCount()>0){
			$usuario = $query->fetch(PDO::FETCH_ASSOC);
			$info = array_unshift($usuario, "ok");
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
	<!-- Tags Meta de configirações iniciais -->
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Tags meta de defini~ções basicas do site -->
    <meta name="author" content="Gustavo Pessoa - CodNome.com.br">
    <meta name="description" content="Descrição do site aqui">
    <meta name="keywords" content="todas, as palavras, chavss do site, separadas, por virgula">
    <!--Meta Tags ogg - SocialNetworks-->
 	<meta property="og:type" content="website">
 	<meta property="og:title" content="nome do site">
	<meta property="og:description" content="Descrição do site">
 	<meta property="og:url" content="url do site">
 	<meta property="og:image" content="imagem prévia do site">
    <!-- titulo da pagina -->
	<title>Meu Blog</title>
	<!-- Fontes personalizadas -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <!-- link para reset Normalize -->
    <link rel="stylesheet" type="text/css" href="../assets/css/lib/normalize.css">
    <!-- links css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<!-- links js -->
</head>
<body>
	<!-- Cabeçalho da página -->
	<header>
		<nav class="menu">
			<div class="container">
				<ul>
					<li><a href="../index.php" class="active">Blog</a></li>
					<li><a href="./writers.php">Escritores</a></li>
					<li><a href="./contact.php">Contato</a></li>
				</ul>
				<ul>
                    <li class="dropDown"><a href="#" class="lgAdmin"><img src="../assets/img/admIcon.png" alt=""></a> 
						<div class="login">
							<form method="post">
								<fieldset class="fieldsetLogin">
									<legend>Login Administração</legend>
									<input type="email" name="email" id="email" placeholder="E-mail">
									<input type="password" name="senha" id="senha" placeholder="Senha">
									<input type="submit" id="logar" value="Entrar">
								</fieldset>
							</form>
						</div>
					</li>
                </ul>
			</div>
		</nav>
		<h1><a href="../index.php">Meu Blog</a> </h1>
		<h2>Um blog criado por mim, especifico para que eu gosto</h2>		
	</header>
	<!-- Conteúdo Principal da Página -->
	<main>
		<!-- Declaração uma sessão do site -->
		<section>
            <div class="container contact">
				<h1>Contato</h2>
				<h2>Dúvidas? Sugestões? Quer bater um papo?<br>Mande uma mensagem para nós! Prometemos responder.<br> <span>&#128521;</span> </h2>
				<div>
					 <form method="post">
						<fieldset class="contactForm">
	 						<legend>Contate-nos</legend>
							<input type="text" name="nome" id="nomeMsg" placeholder="Nome">
							<input type="email" name="email" id="emailMsg"placeholder="E-mail" >
							<input type="tel" name="tel" id="tel" pattern="[0-9]{11}" placeholder="Telefone" >
							<input type="text" name="assunto" id="assunto" placeholder="Assunto" >
							<textarea name="msg" id="msg" placeholder="Digite sua Mensagem"></textarea>
							<div>
								<input type="submit" value="Enviar">
							</div>
	 						
						</fieldset>
					 </form>
				</div>
            </div>
        </section>
        <aside>
            <div class="asideHeader">

            </div>
            <div class="asideContent">
                
            </div>
        </aside>
    </main>
    <!-- Rodapé da Página -->
    <footer>
        <div class="socialNetworks">
            <ul>
                <li><a href=""><img src="../assets/img/twitter.png" alt="" title=""></a></li>
                <li><a href=""><img src="../assets/img/facebook.png" alt="" title=""></a></li>
                <li><a href=""><img src="../assets/img/instagram.png" alt="" title=""></a></li>
            </ul>
        </div>
        <!-- delcaração de direitos padrão -->
        <p>&copy; Copyright 2015-2019 CodNome.com.br - Todos os Direitos Reservados</p>
    </footer>
    <script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>