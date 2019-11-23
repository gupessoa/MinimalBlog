<?php
	 $pdo;
	 // Criando a Conexão de BD'
	 try{
	 $pdo = new PDO("mysql:dbname=tombo;host=localhost", "root", "");
	 }catch(PDOException $e){
	 echo "Erro: "+$e->getMessage();
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
            <div class="container writers">
                <h1>Escritores</h2>
                <h2>Nosso blog é Constituido por algumas mentes brilhantes que se dedicam a entregar o 
                    melhor conteúdo.<br>Venha quem são nossos colaboradores:</h2>
                <div class="writersList">
                    <h3>Gustavo Pessoa</h3>
                    <div class="writerDesc">
                            <figure>
                                    <img src="../assets/img/1.jpg" alt="" title="">
                                </figure>
                        <p> Corpo de Homem e Alma de Criança, muito "na dele", o que as pessoas costumam rotular, por parte delas, como "Metido" na verdade é apenas uma boa dose de timidez. Desenvolvedor de Alguma coisa ligada a T.I. Apaixonado por Animes e Dramas Orientais, vulgos Doramas. 
                            Bipolar assumido e diagnosticado que ao longo dos anos aprendeu muito sobre o "eu", uma boa dose de alto conhecimento, altos e baixos, indas e vindas.
                  Um cara normal como qualquer outro, cheio de defeitos e com muitas qualidades, especial com seu jeito de ser.
                            Canceriano nato, não que isso seja muita coisa. Super familia, Marido devotado, amoroso e apegado. Amigo leal, fiel e "pau pra toda obra", "sem julgamentos desnecessários né?!". <br>
                            Preocupado com o lado espirutal e religioso, zeloso com aquilo que acredita ser verdadeiro e bom. <br>
                            Estudioso e dedicado profissionalmente, não tem "corpo mole" quando o assunto é fazer a coisa certa da forma certa. As vezes ansioso e hiperativo.</p>
                    </div>
                </div>
                <div class="writersList">
                        <h3>Vanilson Fickert</h3>
                        <div class="writerDesc">
                                <figure>
                                        <img src="../assets/img/1.jpg" alt="" title="">
                                    </figure>
                            <p> Corpo de Homem e Alma de Criança, muito "na dele", o que as pessoas costumam rotular, por parte delas, como "Metido" na verdade é apenas uma boa dose de timidez. Desenvolvedor de Alguma coisa ligada a T.I. Apaixonado por Animes e Dramas Orientais, vulgos Doramas. 
                                Bipolar assumido e diagnosticado que ao longo dos anos aprendeu muito sobre o "eu", uma boa dose de alto conhecimento, altos e baixos, indas e vindas.
                      Um cara normal como qualquer outro, cheio de defeitos e com muitas qualidades, especial com seu jeito de ser.
                                Canceriano nato, não que isso seja muita coisa. Super familia, Marido devotado, amoroso e apegado. Amigo leal, fiel e "pau pra toda obra", "sem julgamentos desnecessários né?!". <br>
                                Preocupado com o lado espirutal e religioso, zeloso com aquilo que acredita ser verdadeiro e bom. <br>
                                Estudioso e dedicado profissionalmente, não tem "corpo mole" quando o assunto é fazer a coisa certa da forma certa. As vezes ansioso e hiperativo.</p>
                        </div>
                    </div>
            </div>
            <div class="modal"> 
                <div class="modalContent">
                    <span class="closeModal">&times;</span>
                    <h1>Entrar como Administrador</h1>
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